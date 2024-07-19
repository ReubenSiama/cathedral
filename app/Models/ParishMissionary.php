<?php

namespace App\Models;

use App\Enums\MissionaryType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParishMissionary extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'name',
        'address',
    ];

    protected $casts = [
        'type' => MissionaryType::class,
    ];

    public function scopeSisters($query)
    {
        return $query->where('type', MissionaryType::SISTER);
    }

    public function scopeBrothers($query)
    {
        return $query->where('type', MissionaryType::BROTHER);
    }

    public function scopePriests($query)
    {
        return $query->where('type', MissionaryType::PRIEST);
    }
}
