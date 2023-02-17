<?php

namespace App\Services;

use App\Factories\Flight\FlightFactory;
use App\Models\Flight;
use Exception;

class FlightService
{
    /**
     * Create a new flight
     *
     * @throws Exception
     */
    public function createFlight(array $data): Flight
    {
        return FlightFactory::factory($data['flightCategory'])->createFlight($data);
    }

    /**
     * Update an existing Flight.
     *
     * @param Flight $flight
     * @param array $data
     * @return Flight
     * @throws Exception
     */
    public function updateFlight(Flight $flight, array $data): Flight
    {
        return FlightFactory::factory($data['flightCategory'])->updateFlight($flight, $data);
    }

    /**
     * Delete an existing Flight.
     *
     * @param Flight $flight
     * @return Flight
     * @throws Exception
     */
    public function deleteFlight(Flight $flight): Flight
    {
        $flight->delete();

        return $flight;
    }
}
