<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum PriestType: string implements HasLabel
{
    case PARISHPRIEST = 'parish_priest';
    case ASSISTANT = 'assistant_parish_priest';

    public function getLabel(): string
    {
        return match ($this) {
            self::PARISHPRIEST => 'Parish Priest',
            self::ASSISTANT => 'Assistant Parish Priest',
        };
    }
}
