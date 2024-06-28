<?php

namespace App\Filament\Common;

use Filament\Tables;

class CauserDisplay
{
    public static function create()
    {
        return Tables\Columns\TextColumn::make('causer.user.name')
            ->label('Entered By')
            ->searchable();
    }
}
