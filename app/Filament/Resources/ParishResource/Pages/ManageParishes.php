<?php

namespace App\Filament\Resources\ParishResource\Pages;

use App\Filament\Resources\ParishResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageParishes extends ManageRecords
{
    protected static string $resource = ParishResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalWidth('md')
                ->createAnother(false),
        ];
    }
}
