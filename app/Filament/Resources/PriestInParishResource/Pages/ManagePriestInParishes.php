<?php

namespace App\Filament\Resources\PriestInParishResource\Pages;

use App\Filament\Resources\PriestInParishResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePriestInParishes extends ManageRecords
{
    protected static string $resource = PriestInParishResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalWidth('md'),
        ];
    }
}
