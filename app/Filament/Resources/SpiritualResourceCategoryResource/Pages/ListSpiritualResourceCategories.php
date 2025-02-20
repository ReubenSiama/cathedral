<?php

namespace App\Filament\Resources\SpiritualResourceCategoryResource\Pages;

use App\Filament\Resources\SpiritualResourceCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSpiritualResourceCategories extends ListRecords
{
    protected static string $resource = SpiritualResourceCategoryResource::class;

    protected static bool $createAnother = false;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
