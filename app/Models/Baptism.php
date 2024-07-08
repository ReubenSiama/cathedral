<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baptism extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function priest(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Priest::class)
        ->select(['id','full_name']);
    }

    public function parish(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Parish::class)
        ->select(['id','name']);
    }

    public function nationality(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Nationality::class)
        ->select(['id','name']);
    }

    public function causer(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Causer::class, 'modelable');
    }
}
