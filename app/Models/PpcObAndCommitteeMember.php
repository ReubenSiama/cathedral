<?php

namespace App\Models;

use App\Enums\ObAndCommitteeRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PpcObAndCommitteeMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'ppc_ob_and_committee_id',
    ];

    protected $casts = [
        'role' => ObAndCommitteeRole::class,
    ];

    public function ppcObAndCommittee(): BelongsTo
    {
        return $this->belongsTo(PpcObAndCommittee::class);
    }
}
