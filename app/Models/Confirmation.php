<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Confirmation extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function parish(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Parish::class);
    }

    public function bishop(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Bishop::class);
    }

    public function causer(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Causer::class, 'modelable');
    }
}
