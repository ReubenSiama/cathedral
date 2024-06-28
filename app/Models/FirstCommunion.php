<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirstCommunion extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function parish(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Parish::class);
    }

    public function priest(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Priest::class);
    }

    public function placeOfBaptism(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Parish::class, 'place_of_baptism');
    }

    public function causer(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Causer::class, 'modelable');
    }
}
