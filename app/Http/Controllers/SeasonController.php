<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Season;
use Exception;

class SeasonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('seasons.index', ['seasons' => Season::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('seasons.create', [
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
            Season::query()->create([
                'name'       => $request->input('name'),
                'start_date' => $request->input('start_date'),
                'end_date'   => $request->input('end_date'),
            ]);

            return redirect()->route('seasons.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Season $season
     * @return View
     */
    public function edit(Season $season): View
    {
        return view('seasons.edit', [
            'season'    => $season,
            'companies' => Company::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Season $season
     * @return RedirectResponse
     */
    public function update(Request $request, Season $season): RedirectResponse
    {
        try {
            $season->update([
                'start_date' => $request->input('start_date'),
                'end_date'   => $request->input('end_date'),
            ]);

            return redirect()->route('seasons.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Season $season
     * @return RedirectResponse
     */
    public function destroy(Season $season): RedirectResponse
    {
        $season->delete();

        return redirect()->back();
    }
}
