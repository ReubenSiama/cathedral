<?php

namespace App\Filament\Resources\ParishPastoralCouncilResource\Pages;

use App\Filament\Resources\ParishPastoralCouncilResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListParishPastoralCouncils extends ListRecords
{
    protected static string $resource = ParishPastoralCouncilResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
