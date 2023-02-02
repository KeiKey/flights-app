<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
        return view('flights.index', ['flights' => Flight::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('flights.create', [
            'companies' => Company::all()
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
            Flight::query()
                ->create([
                    'company_id' => $request->input('company'),
                    'start_date' => $request->input('start_date'),
                    'end_date'   => $request->input('end_date'),
                ]);

            return redirect()->route('flights.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Flight $season
     * @return View
     */
    public function edit(Flight $season): View
    {
        return view('flights.edit', [
            'season'    => $season,
            'companies' => Company::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Flight $season
     * @return RedirectResponse
     */
    public function update(Request $request, Flight $season): RedirectResponse
    {
        try {
            $season->update([
                'name' => $request->input('name')
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
