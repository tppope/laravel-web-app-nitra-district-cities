<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    protected $guarded = [];

    public function cityHallAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }

    public function scopeSearch(Builder $query, $cityName): void
    {
        $query->where('name', 'LIKE', "%$cityName%");
    }
}
