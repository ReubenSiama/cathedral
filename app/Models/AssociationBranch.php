<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
