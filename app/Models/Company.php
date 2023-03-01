<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * @property int id
 * @property int season_id
 * @property string name
 * @property Carbon created_at
 * @property Carbon updated_at
 * @property Carbon deleted_at
 */
class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['season_id', 'name'];

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}
