<?php

namespace App\Models;

use App\Enums\ObAndCommitteeType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PpcObAndCommittee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ppc_term_id',
        'type',
    ];

    protected $casts = [
        'type' => ObAndCommitteeType::class,
    ];

    public function ppcTerm(): BelongsTo
    {
        return $this->belongsTo(PpcTerm::class);
    }
}
