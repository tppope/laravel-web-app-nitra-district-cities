<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{

    protected $guarded = [];

    public function cityHallAddress(): BelongsTo
    {
        return $this->belongsTo(Address::class);
    }
}
