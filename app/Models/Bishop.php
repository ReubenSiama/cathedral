<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bishop extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'is_current' => 'boolean',
    ];

    public function scopeCurrent()
    {
        return $this->where('is_current', true)->first();
    }
}
