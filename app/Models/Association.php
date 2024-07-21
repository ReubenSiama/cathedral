<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Association extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function name(): Attribute
    {
        return new Attribute(
            set: fn ($value) => [
                'name' => $value,
                'slug' => Str::slug($value),
            ],
        );
    }

    public function associationBranches(): HasMany
    {
        return $this->hasMany(AssociationBranch::class);
    }
}
