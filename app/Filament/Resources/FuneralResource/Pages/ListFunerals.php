<?php

namespace App\Filament\Resources\FuneralResource\Pages;

use App\Filament\Resources\FuneralResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFunerals extends ListRecords
{
    protected static string $resource = FuneralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
