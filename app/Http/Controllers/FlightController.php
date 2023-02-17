<?php

namespace App\Http\Controllers;

use App\Enums\FlightCategory;
use App\Models\Company;
use App\Models\Season;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Flight;
use Exception;

class FlightController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('flights.index', ['flights' => Flight::query()->filter(request()->all())->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('flights.create', [
            'flightCategories' => FlightCategory::toArray(),
            'seasons'          => Season::query()->with('companies')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            /** @var Season $season */
            $season = Season::query()->findOrFail($request->input('flightSeason'));
            $daysToHaveFlights = array_filter($request->input('timetables'), fn($day) => !empty($day));
            foreach (CarbonPeriod::create($season->start_date, $season->end_date) as $date) {
                if (!array_key_exists($date->dayName, $daysToHaveFlights)){
                    continue;
                }

                $season->companies
                    ->each(function (Company $company) use ($season, $date, $daysToHaveFlights, $request) {
                        Flight::query()->create([
                            'season_id'               => $season->id,
                            'company_id'              => $company->id,
                            'flight_category'         => $request->input('flightCategory'),
                            'flight_date'             => $date,
                            'flight_hour'             => $daysToHaveFlights[$date->dayName],
                            'destination'             => $request->input('destination'),
                            'destination_description' => $request->input('destination_description'),
                            'call_sign'               => $request->input('call_sign'),
                            'comment'                 => $request->input('comment')
                        ]);
                    });
            }

            return redirect()->route('flights.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Flight $flight
     * @return View
     */
    public function edit(Flight $flight): View
    {
        return view('flights.edit', [
            'flight'           => $flight,
            'flightCategories' => FlightCategory::toArray(),
            'seasons'          => Season::query()->with('companies')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Flight $flight
     * @return RedirectResponse
     */
    public function update(Request $request, Flight $flight): RedirectResponse
    {
        try {
            $flight->update([
                'flight_date'             => $request->input('flight_date'),
                'flight_hour'             => $request->input('flight_hour'),
                'destination'             => $request->input('destination'),
                'destination_description' => $request->input('destination_description'),
                'call_sign'               => $request->input('call_sign'),
                'comment'                 => $request->input('comment')
            ]);

            return redirect()->route('flights.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Flight $season
     * @return RedirectResponse
     */
    public function destroy(Flight $season): RedirectResponse
    {
        $season->delete();

        return redirect()->back();
    }
}
