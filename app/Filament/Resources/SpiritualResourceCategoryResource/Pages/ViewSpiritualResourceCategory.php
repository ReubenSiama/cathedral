<?php

namespace App\Filament\Resources\SpiritualResourceCategoryResource\Pages;

use App\Filament\Resources\SpiritualResourceCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSpiritualResourceCategory extends ViewRecord
{
    protected static string $resource = SpiritualResourceCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
