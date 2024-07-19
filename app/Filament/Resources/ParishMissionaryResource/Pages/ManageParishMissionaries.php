<?php

namespace App\Filament\Resources\ParishMissionaryResource\Pages;

use App\Filament\Resources\ParishMissionaryResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageParishMissionaries extends ManageRecords
{
    protected static string $resource = ParishMissionaryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalWidth('md'),
        ];
    }
}
