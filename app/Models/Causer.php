<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Causer extends Model
{
    use HasFactory;

    protected $fillable = [
        'model_type',
        'model_id',
        'user_id',
    ];

    public function modelable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
