<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marriage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function personalDetails()
    {
        return $this->hasMany(MarriagePersonalDetail::class);
    }

    public function witnesses()
    {
        return $this->hasMany(Witness::class);
    }

    public function priest()
    {
        return $this->belongsTo(Priest::class);
    }

    public function parishPriest()
    {
        return $this->belongsTo(Priest::class);
    }

    public function parish()
    {
        return $this->belongsTo(Parish::class);
    }

    public function bride(): Attribute
    {
        return new Attribute(
            get: fn() => $this->personalDetails->where('type', 'bride')->first()
        );
    }

    public function bridegroom(): Attribute
    {
        return new Attribute(
            get: fn() => $this->personalDetails->where('type', 'bridegroom')->first()
        );
    }

    public function firstWitness(): Attribute
    {
        return new Attribute(
            get: fn() => $this->witnesses[0]
        );
    }

    public function secondWitness(): Attribute
    {
        return new Attribute(
            get: fn() => $this->witnesses[1]
        );
    }
}
