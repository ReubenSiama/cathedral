<?php

namespace App\Filament\Common;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Models\Language;
use Filament\Forms;

class LocaleGenerator
{

    public static function make($field, $key)
    {
        $locales = Language::all();

        return Forms\Components\Tabs::make($field)
        ->tabs(
            self::getTabs($locales, $key)
        );
    }

    private function getTabs($locales, $key)
    {
        $tabs = [];

        foreach ($locales as $locale) {
            $tabs[] = Forms\Components\Tabs\Tab::make($locale->name)
            ->schema([
                self::getField($key, $locale->code)
            ]);
        }

        return $tabs;
    }

    private function getField($type, $fieldName)
    {
        return match ($type) {
            'default' => Forms\Components\TextInput::make($fieldName),
            'textarea' => Forms\Components\Textarea::make($fieldName),
            'tiny' => TinyEditor::make($fieldName),
        };
    }
}
