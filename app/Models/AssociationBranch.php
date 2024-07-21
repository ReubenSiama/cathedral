<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AssociationBranch extends Model
{
    use HasFactory;

    protected $fillable = [
        'association_id',
        'name',
        'image',
        'description',
        'address',
    ];

    public function association(): BelongsTo
    {
        return $this->belongsTo(Association::class);
    }
}
