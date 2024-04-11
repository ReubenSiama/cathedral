<?php

namespace App\Filament\Resources\MassTimingResource\Pages;

use App\Filament\Resources\MassTimingResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageMassTimings extends ManageRecords
{
    protected static string $resource = MassTimingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
