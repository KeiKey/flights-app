<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Services\ScheduledFlightService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\ScheduledFlight;
use Exception;

class CharterController extends Controller
{
    public function __construct(private ScheduledFlightService $scheduledFlightService)
    {}

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('scheduled-flights.index', [
            'scheduledFlights' => ScheduledFlight::query()
                ->orderBy('id', 'DESC')
                ->filter(request()->all())
                ->paginate(20)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param ScheduledFlight $scheduledFlight
     * @return View
     */
    public function show(ScheduledFlight $scheduledFlight): View
    {
        return view('scheduled-flights.show', ['flight' => $scheduledFlight->load(['season', 'company'])]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('scheduled-flights.create');
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
            $this->scheduledFlightService->createFlight($request->all());

            return redirect()->route('scheduled-flights.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ScheduledFlight $scheduledFlight
     * @return View
     */
    public function edit(ScheduledFlight $scheduledFlight): View
    {
        return view('scheduled-flights.edit', [
            'scheduledFlight' => $scheduledFlight,
            'seasons'         => Season::query()->with('companies')->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param ScheduledFlight $scheduledFlight
     * @return RedirectResponse
     */
    public function update(Request $request, ScheduledFlight $scheduledFlight): RedirectResponse
    {
        try {
            $this->scheduledFlightService->updateFlight($scheduledFlight, $request->all());

            return redirect()->route('scheduled-flights.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ScheduledFlight $scheduledFlight
     * @return RedirectResponse
     */
    public function destroy(ScheduledFlight $scheduledFlight): RedirectResponse
    {
        try {
            $this->scheduledFlightService->deleteFlight($scheduledFlight);

            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }
}
