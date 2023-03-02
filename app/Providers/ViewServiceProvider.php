<?php

namespace App\Providers;

use App\Models\Company;
use App\Models\ScheduledFlight;
use App\Models\Season;
use Illuminate\Notifications\DatabaseNotification;
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
                'companies'        => Company::query()->pluck('name', 'id'),
                'seasons'          => Season::query()->get()
            ]);
        });

        View::composer('partials.notifications', function ($view) {
            $view->with(['notifications' => auth()->user()->unreadNotifications->filter(function(DatabaseNotification $notification) {
                /** @var ScheduledFlight $flight */
                $flight = ScheduledFlight::query()->find($notification->data['flight_id']);
                    $notification->append(['testttt' => 'ddd']);

                    $notification->getAttribute('testttt');

                return $flight->flight_date->isToday() || $flight->flight_date->isTomorrow();
            }) ?? []]);
        });
    }
}
