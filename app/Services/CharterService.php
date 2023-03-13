<?php

namespace App\Services;

use App\Models\Charter;
use Exception;

class CharterService
{
    /**
     * Create a new flight
     *
     * @throws Exception
     */
    public function createFlight(array $data): Charter
    {
        return Charter::query()->create([
            'flight_date'       => $data['flight_date'],
            'call_sign'         => $data['call_sign'],
            'type_of_aircraft'  => $data['type_of_aircraft'],
            'type_of_flight'    => $data['type_of_flight'],
            'nationality'       => $data['nationality'],
            'from'              => $data['from'],
            'to'                => $data['to'],
            'purpose_of_flight' => $data['purpose_of_flight'],
            'eta'               => $data['eta'],
            'etd'               => $data['etd'],
            'clearance_no'      => $data['clearance_no'],
            'comment'           => $data['comment'],
        ]);
    }

    /**
     * Update an existing Charter.
     *
     * @param Charter $flight
     * @param array $data
     * @return Charter
     * @throws Exception
     */
    public function updateFlight(Charter $flight, array $data): Charter
    {
        $flight->update([
            'flight_date'       => $data['flight_date'],
            'call_sign'         => $data['call_sign'],
            'type_of_aircraft'  => $data['type_of_aircraft'],
            'type_of_flight'    => $data['type_of_flight'],
            'nationality'       => $data['nationality'],
            'from'              => $data['from'],
            'to'                => $data['to'],
            'purpose_of_flight' => $data['purpose_of_flight'],
            'eta'               => $data['eta'],
            'etd'               => $data['etd'],
            'clearance_no'      => $data['clearance_no'],
            'comment'           => $data['comment'],
        ]);

        return $flight;
    }

    /**
     * Delete an existing Charter.
     *
     * @param Charter $flight
     * @return Charter
     * @throws Exception
     */
    public function deleteFlight(Charter $flight): Charter
    {
        $flight->delete();

        return $flight;
    }
}
