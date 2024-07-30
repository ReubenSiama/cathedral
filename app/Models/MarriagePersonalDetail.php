<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MarriagePersonalDetail extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function marriage(): BelongsTo
    {
        return $this->belongsTo(Marriage::class);
    }

    public function nationality(): BelongsTo
    {
        return $this->belongsTo(Nationality::class);
    }

    public function fullName(): Attribute
    {
        return new Attribute(
            get: fn () => $this->name . ' ' . $this->surname
        );
    }
}
