<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;

class LogController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage_log');
    }

    /**
     * Show administation log page.
     *
     * @param SearchRequest $request
     * @return View
     */
    public function logs(SearchRequest $request): View
    {
        $q = $request->input('search');

        return view('logs', [
            'logs' => Activity::query()->when($q, function (Builder $builder) use ($q) {
                return $builder
                    ->orWhere('event', 'LIKE', '%'.$q.'%')
                    ->orWhere('description', 'LIKE', '%'.$q.'%');
            })->latest()->paginate(20)
        ]);
    }
}
