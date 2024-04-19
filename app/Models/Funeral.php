<?php

namespace App\Models;

use App\Enums\CveInfant;
use App\Enums\Relationship;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funeral extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public $casts = [
        'relationship' => Relationship::class,
        'cve_or_infants' => CveInfant::class,
        'parent_spouse_name' => 'array',
    ];

    public function priest(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Priest::class);
    }
}
