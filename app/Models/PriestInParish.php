<?php

namespace App\Models;

use App\Enums\PriestType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriestInParish extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'image',
        'from',
        'to',
    ];

    protected $casts = [
        'type' => PriestType::class,
    ];

    public function scopeParishPriest($query)
    {
        return $query->where('type', PriestType::PARISHPRIEST);
    }

    public function scopeAssistantPriest($query)
    {
        return $query->where('type', PriestType::ASSISTANT);
    }
}
