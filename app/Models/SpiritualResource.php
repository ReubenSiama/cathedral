<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SpiritualResource extends Model
{
    use HasFactory;

    protected $fillable = [
        'spiritual_resource_category_id',
        'url',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(SpiritualResourceCategory::class);
    }

    public function translations(): MorphMany
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    public function getTranslation(string $key, string $locale = null): string
    {
        $locale = $locale ?? app()->getLocale();
        $translation = $this->translations()->where('key', $key)->where('locale', $locale)->first();
        return $translation ? $translation->value : '';
    }

    public function title(): Attribute
    {
        $locale = app()->getLocale();
        return new Attribute(
            get: function () use ($locale) {
                return $this->getTranslation('title', $locale);
            },
        );
    }

    public function content(): Attribute
    {
        $locale = app()->getLocale();
        return new Attribute(
            get: function () use ($locale) {
                return $this->getTranslation('content', $locale);
            },
        );
    }

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachmentable');
    }
}
