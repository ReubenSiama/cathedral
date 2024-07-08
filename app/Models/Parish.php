<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Parish extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'banner',
        'about',
        'address',
        'short_description',
        'slug',
        'display_at_homepage',
    ];

    protected $casts = [
        'display_at_homepage' => 'boolean',
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

    public function scopeDisplayAtHomepage($query)
    {
        return $query->where('display_at_homepage', true);
    }
}
