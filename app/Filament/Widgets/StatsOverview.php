<?php

namespace App\Filament\Widgets;

use App\Models\Baptism;
use App\Models\Confirmation;
use App\Models\FirstCommunion;
use App\Models\Funeral;
use App\Models\Marriage;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make('Users', User::count()),
            Stat::make('Baptisms', Baptism::count()),
            Stat::make('Confirmation', Confirmation::count()),
            Stat::make('First Communion', FirstCommunion::count()),
            Stat::make('Funeral', Funeral::count()),
            Stat::make('Marriage', Marriage::count()),
        ];
    }
}
