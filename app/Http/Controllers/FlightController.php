<?php

namespace App\Http\Controllers;

use App\Enums\FlightCategory;
use App\Models\Company;
use App\Models\Season;
use App\Services\FlightService;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Flight;
use Exception;

class FlightController extends Controller
{
    public function __construct(private FlightService $flightService)
    {}

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
            $this->flightService->createFlight($request->all());

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
            $this->flightService->updateFlight($flight, $request->all());

            return redirect()->route('flights.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Flight $flight
     * @return RedirectResponse
     */
    public function destroy(Flight $flight): RedirectResponse
    {
        try {
            $this->flightService->deleteFlight($flight);

            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }
}
