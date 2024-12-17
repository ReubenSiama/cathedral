<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum ObAndCommitteeRole: string implements HasLabel
{
    case CHAIRMAN = 'Chairman';
    case VICE_CHAIRMAN = 'Vice Chairman';
    case SECRETARY = 'Secretary';
    case ASSISTANT_SECRETARY = 'Assistant Secretary';
    case TREASURER = 'Treasurer';
    case FINANCE_SECRETARY = 'Finance Secretary';

    public function getLabel(): string
    {
        return match ($this) {
            self::CHAIRMAN => 'Chairman',
            self::VICE_CHAIRMAN => 'Vice Chairman',
            self::SECRETARY => 'Secretary',
            self::ASSISTANT_SECRETARY => 'Assistant Secretary',
            self::TREASURER => 'Treasurer',
            self::FINANCE_SECRETARY => 'Finance Secretary',
        };
    }
}
