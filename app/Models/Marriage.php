<?php

namespace App\Models;

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
}
