<?php

namespace App\Services;

use App\Models\Company;
use App\Models\ScheduledFlight;
use App\Models\Season;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Exception;

class ScheduledFlightService
{
    /**
     * Create a new flight
     *
     * @throws Exception
     */
    public function createFlight(array $data)
    {
        /** @var Season $season */
        $season = Season::query()->find($data['flightSeason']);
        $daysToHaveFlights = array_filter($data['timetables'], fn($day) => !empty($day));

        foreach (CarbonPeriod::create(Carbon::parse($data['start_date']), Carbon::parse($data['end_date'])) as $date) {
            if (!array_key_exists($date->dayName, $daysToHaveFlights)){
                continue;
            }

            $season->companies
                ->each(function (Company $company) use ($season, $date, $daysToHaveFlights, $data) {
                    ScheduledFlight::query()->create([
                        'season_id'               => $season->id,
                        'company_id'              => $company->id,
                        'flight_date'             => $date,
                        'flight_hour'             => $daysToHaveFlights[$date->dayName],
                        'destination'             => $data['destination'],
                        'destination_description' => $data['destination_description'],
                        'call_sign'               => $data['call_sign'],
                        'arrival'                 => $data['arrival'],
                        'comment'                 => $data['comment']
                    ]);
                });
        }
    }

    /**
     * Update an existing ScheduledFlight.
     *
     * @param ScheduledFlight $flight
     * @param array $data
     * @return ScheduledFlight
     * @throws Exception
     */
    public function updateFlight(ScheduledFlight $flight, array $data): ScheduledFlight
    {
        $flight->update([
            'flight_date'             => $data['flight_date'],
            'flight_hour'             => $data['flight_hour'],
            'destination'             => $data['destination'],
            'destination_description' => $data['destination_description'],
            'call_sign'               => $data['call_sign'],
            'arrival'                 => $data['arrival'],
            'comment'                 => $data['comment'],
        ]);

        return $flight;
    }

    /**
     * Delete an existing ScheduledFlight.
     *
     * @param ScheduledFlight $flight
     * @return ScheduledFlight
     * @throws Exception
     */
    public function deleteFlight(ScheduledFlight $flight): ScheduledFlight
    {
        $flight->delete();

        return $flight;
    }
}
