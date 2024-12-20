<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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

    public function members(): HasManyThrough
    {
        return $this->hasManyThrough(PpcObAndCommitteeMember::class, PpcObAndCommittee::class);
    }
}
