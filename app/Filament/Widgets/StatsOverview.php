<?php

namespace App\Filament\Widgets;

use App\Models\Baptism;
use App\Models\Confirmation;
use App\Models\FirstCommunion;
use App\Models\Funeral;
use App\Models\Marriage;
use App\Models\User;
use App\Models\Visitor;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {
        return [
            Stat::make('Baptisms', Baptism::count()),
            Stat::make('First Communion', FirstCommunion::count()),
            Stat::make('Confirmation', Confirmation::count()),
            Stat::make('Marriage', Marriage::count()),
            Stat::make('Funeral', Funeral::count()),
            Stat::make('Users', User::count()),
            Stat::make('Today\'s Visitors', Visitor::whereDate('created_at', date('Y-m-d'))->count()),
        ];
    }
}
