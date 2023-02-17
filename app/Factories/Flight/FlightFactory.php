<?php

namespace App\Factories\Flight;

use App\Enums\FlightCategory;
use Exception;

class FlightFactory
{
    /**
     * Generate a flights object based on the category.
     *
     * @throws Exception
     */
    public static function factory(string $flightCategory): BaseFlight
    {
        return match ($flightCategory) {
            FlightCategory::SCHEDULED => new ScheduledFlight(),
            default                   => throw new Exception('There cant be generated an object!')
        };
    }
}
