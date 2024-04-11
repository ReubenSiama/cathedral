<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum InstitutionType: string implements HasLabel
{
    case INSTITUTION = 'institution';
    case OTHERS = 'others';

    public function getLabel(): string
    {
        return match ($this) {
            self::INSTITUTION => 'Institution',
            self::OTHERS => 'Others',
        };
    }
}
