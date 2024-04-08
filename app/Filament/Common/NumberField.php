<?php

namespace App\Filament\Common;

use Filament\Forms;

class NumberField
{
    public static function create()
    {
        return Forms\Components\TextInput::make('number')
            ->required()
            ->minValue(1)
            ->placeholder('____/____')
            ->regex('/^\d{2,4}\/\d{2,4}$/')
            ->validationMessages(
                [
                    'regex' => 'The number must be in the format XXXX/XXXX.',
                ]
            );
    }
}
