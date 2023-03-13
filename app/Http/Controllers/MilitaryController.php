<?php

namespace App\Http\Controllers;

use App\Enums\CharterType;
use App\Models\Charter;
use App\Services\CharterService;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Exception;

class MilitaryController extends Controller
{
    public function __construct(private CharterService $charterService)
    {
        $this->middleware('can:manage_flight');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('charters.index', [
            'charters' => Charter::query()
                ->orderBy('id', 'DESC')
                ->filter(request()->all())
                ->paginate(20)
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Charter $charter
     * @return View
     */
    public function show(Charter $charter): View
    {
        return view('charters.show', ['flight' => $charter]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('charters.create', [
            'charterTypes' => CharterType::toArray()
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
            $this->charterService->createFlight($request->all());

            return redirect()->route('charters.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Charter $charter
     * @return View
     */
    public function edit(Charter $charter): View
    {
        return view('charters.edit', [
            'flight'       => $charter,
            'charterTypes' => CharterType::toArray()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Charter $charter
     * @return RedirectResponse
     */
    public function update(Request $request, Charter $charter): RedirectResponse
    {
        try {
            $this->charterService->updateFlight($charter, $request->all());

            return redirect()->route('charters.index');
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Charter $charter
     * @return RedirectResponse
     */
    public function destroy(Charter $charter): RedirectResponse
    {
        try {
            $this->charterService->deleteFlight($charter);

            return redirect()->back();
        } catch (Exception $exception) {
            return redirect()->back();
        }
    }

    /**
     * Download flights.
     *
     * @return Response
     */
    public function download(): Response
    {
        $pdf = PDF::loadView('pdf.charter-table', [
            'charters' => Charter::query()
                ->orderBy('id', 'DESC')
                ->filter(request()->all())
                ->get()
        ])->setPaper('a4', 'landscape');;

        return $pdf->download('charter-flights.pdf');
    }
}
