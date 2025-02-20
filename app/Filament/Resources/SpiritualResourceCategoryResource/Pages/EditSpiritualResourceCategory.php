<?php

namespace App\Filament\Resources\SpiritualResourceCategoryResource\Pages;

use App\Filament\Resources\SpiritualResourceCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSpiritualResourceCategory extends EditRecord
{
    protected static string $resource = SpiritualResourceCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
