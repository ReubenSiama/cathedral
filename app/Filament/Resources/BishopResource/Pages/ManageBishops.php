<?php

namespace App\Filament\Resources\BishopResource\Pages;

use App\Filament\Resources\BishopResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBishops extends ManageRecords
{
    protected static string $resource = BishopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalWidth('md')
                ->createAnother(false),
        ];
    }
}
