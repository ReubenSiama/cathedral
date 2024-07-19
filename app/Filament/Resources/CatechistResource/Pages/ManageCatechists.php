<?php

namespace App\Filament\Resources\CatechistResource\Pages;

use App\Filament\Resources\CatechistResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCatechists extends ManageRecords
{
    protected static string $resource = CatechistResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
