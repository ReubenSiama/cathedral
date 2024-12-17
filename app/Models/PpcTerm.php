<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PpcTerm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'duration',
    ];

    public function ppcObAndCommittees(): HasMany
    {
        return $this->hasMany(PpcObAndCommittee::class);
    }
}
