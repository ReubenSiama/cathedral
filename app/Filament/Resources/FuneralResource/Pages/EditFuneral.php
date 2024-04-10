<?php

namespace App\Filament\Resources\FuneralResource\Pages;

use App\Filament\Resources\FuneralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFuneral extends EditRecord
{
    protected static string $resource = FuneralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
