<?php

namespace App\Filament\Common;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Models\Language;
use Filament\Forms;

class LocaleGenerator
{

    public static function make($field, $key)
    {
        $languages = Language::all();

        return Forms\Components\Tabs::make()
            ->tabs(self::getTabs($languages, $key, $field));
    }

    private static function getTabs($languages, $key, $field)
    {
        $tabs = [];

        foreach ($languages as $language) {
            $tabs[] = Forms\Components\Tabs\Tab::make($language->name)
            ->schema([
                self::getField($key, $field.'.'.$language->locale)
                ->label(ucwords($field))
            ]);
        }

        return $tabs;
    }

    private static function getField($type, $fieldName)
    {
        return match ($type) {
            'default' => Forms\Components\TextInput::make($fieldName)
                ->required(),
            'textarea' => Forms\Components\Textarea::make($fieldName)
                ->required(),
            'tiny' => TinyEditor::make($fieldName)
                ->required(),
        };
    }
}
