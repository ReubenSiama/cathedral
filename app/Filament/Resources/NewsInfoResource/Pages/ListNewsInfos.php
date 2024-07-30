<?php

namespace App\Filament\Resources\NewsInfoResource\Pages;

use App\Filament\Resources\NewsInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListNewsInfos extends ListRecords
{
    protected static string $resource = NewsInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
