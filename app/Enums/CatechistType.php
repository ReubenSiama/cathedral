<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum CatechistType: string implements HasLabel
{
    case DIOCESE = 'Diocese Catechist';
    case LOCAL = 'Local Catechist';

    public function getLabel(): string
    {
        return match ($this) {
            self::DIOCESE => 'Diocese Catechist',
            self::LOCAL => 'Local Catechist',
        };
    }
}
