<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class SpiritualResourceCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function resources()
    {
        return $this->hasMany(SpiritualResource::class, 'spiritual_resource_category_id');
    }

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
}
