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
        'address',
        'slug',
        'display_at_homepage',
        'location',
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

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    public function getTranslation(string $key, ?string $locale = null)
    {
        $locale = $locale ?? app()->getLocale();
        $translation = $this->translations()->where('key', $key)->where('locale', $locale)->first();

        return $translation ? $translation->value : '';
    }

    public function shortDescription(): Attribute
    {
        $locale = app()->getLocale();

        return new Attribute(
            get: function () use ($locale) {
                return $this->getTranslation('short_description', $locale);
            },
        );
    }

    public function about(): Attribute
    {
        $locale = app()->getLocale();

        return new Attribute(
            get: function () use ($locale) {
                return $this->getTranslation('about', $locale);
            },
        );
    }
}
