<?php

namespace App\Factories\Flight;

use App\Models\Company;
use App\Models\Flight;
use App\Models\Season;
use Carbon\CarbonPeriod;

class ScheduledFlight extends BaseFlight
{
    public function createFlight(array $data)
    {
        /** @var Season $season */
        $season = Season::query()->findOrFail($data['flightSeason']);
        $daysToHaveFlights = array_filter($data['timetables'], fn($day) => !empty($day));

        foreach (CarbonPeriod::create($season->start_date, $season->end_date) as $date) {
            if (!array_key_exists($date->dayName, $daysToHaveFlights)){
                continue;
            }

            $season->companies
                ->each(function (Company $company) use ($season, $date, $daysToHaveFlights, $data) {
                    Flight::query()->create([
                        'season_id'               => $season->id,
                        'company_id'              => $company->id,
                        'flight_category'         => $data['flightCategory'],
                        'flight_date'             => $date,
                        'flight_hour'             => $daysToHaveFlights[$date->dayName],
                        'destination'             => $data['destination'],
                        'destination_description' => $data['destination_description'],
                        'call_sign'               => $data['call_sign'],
                        'comment'                 => $data['comment']
                    ]);
                });
        }
    }

    public function updateFlight(Flight $flight, array $data): Flight
    {
        $flight->update([
            'flight_date'             => $data['flight_date'],
            'flight_hour'             => $data['flight_hour'],
            'destination'             => $data['destination'],
            'destination_description' => $data['destination_description'],
            'call_sign'               => $data['call_sign'],
            'comment'                 => $data['comment']
        ]);

        return $flight;
    }
}
