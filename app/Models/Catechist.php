<?php

namespace App\Models;

use App\Enums\CatechistType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catechist extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'image',
        'address',
        'from',
        'to',
    ];

    protected $casts = [
        'type' => CatechistType::class,
    ];

    public function scopeDiocese($query)
    {
        return $query->where('type', CatechistType::DIOCESE);
    }

    public function scopeLocal($query)
    {
        return $query->where('type', CatechistType::LOCAL);
    }

    public function scopeLocalTillNow($query)
    {
        return $query->local()->whereNull('to')
            ->whereNotNull('from');
    }

    public function scopePastLocal($query)
    {
        return $query->local()->whereNull('to')
            ->whereNull('from');
    }
}
