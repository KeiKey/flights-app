<?php

namespace App\Observers;

use App\Models\ScheduledFlight;
use App\Models\User;
use App\Notifications\IncomingFlightNotification;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class NotamObserver
{
    /**
     * Handle the ScheduledFlight "created" event.
     *
     * @param ScheduledFlight $flight
     * @return void
     */
    public function created(ScheduledFlight $flight): void
    {
        Notification::send(User::all(), (new IncomingFlightNotification($flight)));
    }

    /**
     * Handle the ScheduledFlight "deleted" event.
     *
     * @param ScheduledFlight $flight
     * @return void
     */
    public function deleted(ScheduledFlight $flight): void
    {
        DatabaseNotification::query()->whereJsonContains('flight_id', $flight->id)->delete();
    }

    /**
     * Handle the ScheduledFlight "restored" event.
     *
     * @param ScheduledFlight $flight
     * @return void
     */
    public function restored(ScheduledFlight $flight): void
    {
        DatabaseNotification::query()->withTrashed()->whereJsonContains('flight_id', $flight->id)->restore();
    }

    /**
     * Handle the ScheduledFlight "force deleted" event.
     *
     * @param ScheduledFlight $flight
     * @return void
     */
    public function forceDeleted(ScheduledFlight $flight): void
    {
        DatabaseNotification::query()->whereJsonContains('flight_id', $flight->id)->forceDelete();
    }
}
