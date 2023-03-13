<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

/**
 * @property int id
 * @property Carbon flight_date
 * @property string call_sign
 * @property string type_of_aircraft
 * @property string type_of_flight
 * @property string nationality
 * @property string from
 * @property string to
 * @property string purpose_of_flight
 * @property string eta
 * @property string etd
 * @property string clearance_no
 * @property string comment
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 */
class Charter extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'flight_date',
        'call_sign',
        'type_of_aircraft',
        'type_of_flight',
        'nationality',
        'from',
        'to',
        'purpose_of_flight',
        'eta',
        'etd',
        'clearance_no',
        'comment'
    ];

    protected $casts = [
        'flight_date' => 'datetime'
    ];

    public function scopeFilter(Builder $builder, array $data = []): Builder
    {
        return $builder->when(!empty($data['fromDate']), fn (Builder $query) => $query->whereDate('flight_date', '>=', $data['fromDate']))
            ->when(!empty($data['day']), fn (Builder $query) => $query->select('*', DB::raw("DAYNAME(flight_date) AS dayName"))->having('dayName', $data['day']))
            ->when(!empty($data['toDate']), fn (Builder $query) => $query->whereDate('flight_date', '<=', $data['toDate']));
    }
}
