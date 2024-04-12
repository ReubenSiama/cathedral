<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum Relationship: string implements HasLabel
{
    case Spouse = 'Spouse';
    case Parent = 'Parent';

    public function getLabel(): string
    {
        return match ($this) {
            self::Spouse => 'Spouse',
            self::Parent => 'Parent',
        };
    }
}
