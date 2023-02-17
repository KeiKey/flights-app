<?php

namespace App\Providers;

use App\Enums\FlightCategory;
use App\Models\Company;
use App\Models\Season;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        View::composer('partials.filters', function ($view) {
            $view->with([
                'flightCategories' => FlightCategory::toArray(),
                'companies'        => Company::query()->pluck('name', 'id'),
                'seasons'          => Season::query()->get()
            ]);
        });
    }
}
