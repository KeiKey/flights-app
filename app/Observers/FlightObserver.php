<?php

namespace App\Observers;

use App\Models\Flight;
use App\Models\User;
use App\Notifications\IncomingFlightNotification;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Notification;

class FlightObserver
{
    /**
     * Handle the Flight "created" event.
     *
     * @param Flight $flight
     * @return void
     */
    public function created(Flight $flight): void
    {
        Notification::send(User::all(), (new IncomingFlightNotification($flight)));
    }

    /**
     * Handle the Flight "deleted" event.
     *
     * @param Flight $flight
     * @return void
     */
    public function deleted(Flight $flight): void
    {
        DatabaseNotification::query()->whereJsonContains('flight_id', $flight->id)->delete();
    }

    /**
     * Handle the Flight "restored" event.
     *
     * @param Flight $flight
     * @return void
     */
    public function restored(Flight $flight): void
    {
        DatabaseNotification::query()->withTrashed()->whereJsonContains('flight_id', $flight->id)->restore();
    }

    /**
     * Handle the Flight "force deleted" event.
     *
     * @param Flight $flight
     * @return void
     */
    public function forceDeleted(Flight $flight): void
    {
        DatabaseNotification::query()->whereJsonContains('flight_id', $flight->id)->forceDelete();
    }
}
