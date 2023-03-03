<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Season;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('companies.index', ['companies' => Company::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('companies.create', ['seasons' => Season::all()]);
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
            Company::query()->create([
                'name' => $request->input('name'),
                'season_id' => $request->input('season_id')
            ]);

            return redirect()->route('companies.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return View
     */
    public function edit(Company $company): View
    {
        return view('companies.edit', ['company' => $company, 'seasons' => Season::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(Request $request, Company $company): RedirectResponse
    {
        try {
            $company->update([
                'name' => $request->input('name'),
                'season_id' => $request->input('season_id')
            ]);

            return redirect()->route('companies.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company): RedirectResponse
    {
        $company->delete();

        return redirect()->back();
    }

    /**
     * Download flights.
     *
     * @return Response
     */
    public function download(): Response
    {
        $pdf = PDF::loadView('pdf.company-table', ['companies' => Company::all()])
            ->setPaper('a4', 'landscape');;

        return $pdf->download('companies.pdf');
    }
}
