<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;

class Flight extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'season_id',
        'company_id',
        'flight_category',
        'flight_date',
        'flight_hour',
        'destination',
        'destination_description',
        'call_sign',
        'comment'
    ];

    protected $casts = [
        'flight_date' => 'datetime'
    ];

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }

    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeFilter(Builder $builder, array $data = []): Builder
    {
        return $builder->when(!empty($data['company']), fn (Builder $query) => $query->whereRelation('company', 'id', $data['company']))
            ->when(!empty($data['season']), fn (Builder $query) => $query->whereRelation('season', 'id', $data['season']))
            ->when(!empty($data['category']), fn (Builder $query) => $query->where('flight_category', $data['category']))
            ->when(!empty($data['fromDate']), fn (Builder $query) => $query->whereDate('flight_date', '>=', $data['fromDate']))
            ->when(!empty($data['toDate']), fn (Builder $query) => $query->whereDate('flight_date', '<=', $data['toDate']));
    }
}
