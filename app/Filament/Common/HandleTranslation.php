<?php

namespace App\Filament\Common;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class HandleTranslation
{
    public static function clearData(array $data, array $fields): array
    {
        $data = Arr::except($data, $fields);
        return $data;
    }

    public static function createTranslation(Model $record, array $data, array $fields): void
    {
        $translationData = self::getTranslation($data, $fields);
        
        $record->translations()->createMany($translationData);
    }

    public static function updateTranslation(Model $record, array $data, array $fields): void
    {
        $translationData = self::getTranslation($data, $fields);

        $record->translations()->delete();
        $record->translations()->createMany($translationData);
    }

    private static function getTranslation($data, $fields): array
    {
        $translations = Arr::only($data, $fields);
        $translationData = [];

        foreach ($translations as $key => $value) {
            foreach ($value as $locale => $translation) {
                $translationData[] = [
                    'locale' => $locale,
                    'key' => $key,
                    'value' => $translation,
                ];
            }
        }

        return $translationData;
    }
}
