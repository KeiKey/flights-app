<?php

namespace App\Notifications;

use App\Models\Flight;
use Illuminate\Notifications\Notification;
use Illuminate\Bus\Queueable;

class IncomingFlightNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(private Flight $flight)
    {}

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via(mixed $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray(mixed $notifiable): array
    {
        return [
            'flight_id' => $this->flight->id,
            'title'     => __('There is an incoming flight'),
            'subtitle'  => $this->flight->flight_date->rawFormat('D, M j, Y').', '.$this->flight->flight_hour,
            'url'       => route('flights.show', $this->flight)
        ];
    }
}
