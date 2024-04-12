<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CveInfant: string implements HasLabel
{
    case CVE = 'C.V.E.';
    case INFANT = 'Infant';

    public function getLabel(): string
    {
        return match ($this) {
            self::CVE => 'C.V.E.',
            self::INFANT => 'Infant',
        };
    }
}
