<?php

namespace App\Factories\Flight;

use App\Models\Flight;
use Illuminate\Database\Eloquent\Collection;

abstract class BaseFlight
{
    public abstract function createFlight(array $data);

    public abstract function updateFlight(Flight $flight, array $data): Flight;

    public function deleteFlight(Flight $flight): Flight
    {
        $flight->delete();

        return $flight;
    }
}
