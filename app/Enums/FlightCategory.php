<?php

namespace App\Enums;

class FlightCategory extends Enum
{
    public const SCHEDULED = 'Scheduled';

    public static function default(): string
    {
        return self::SCHEDULED;
    }
}
