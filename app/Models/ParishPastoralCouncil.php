<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParishPastoralCouncil extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    public function getTranslation(string $key, string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $translation = $this->translations()->where('key', $key)->where('locale', $locale)->first();
        return $translation ? $translation->value : '';
    }

    public function description(): Attribute
    {
        $locale = app()->getLocale();
        return new Attribute(
            get: function () use ($locale) {
                return $this->getTranslation('description', $locale);
            },
        );
    }
}
