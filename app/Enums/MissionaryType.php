<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum MissionaryType: string implements HasLabel
{
    case SISTER = 'Sister';
    case BROTHER = 'Brother';
    case PRIEST = 'Priest';

    public function getLabel(): string
    {
        return match ($this) {
            self::SISTER => 'Sister',
            self::BROTHER => 'Brother',
            self::PRIEST => 'Priest',
        };
    }
}
