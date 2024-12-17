<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ObAndCommitteeType: string implements HasLabel
{
    case OB = 'Office Bearers';
    case COMMITTEE = 'Committee';

    public function getLabel(): string
    {
        return match ($this) {
            self::OB => 'Office Bearers',
            self::COMMITTEE => 'Committee',
        };
    }
}
