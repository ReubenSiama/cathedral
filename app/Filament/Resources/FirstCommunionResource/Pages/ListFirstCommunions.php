<?php

namespace App\Filament\Resources\FirstCommunionResource\Pages;

use App\Filament\Resources\FirstCommunionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFirstCommunions extends ListRecords
{
    protected static string $resource = FirstCommunionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
