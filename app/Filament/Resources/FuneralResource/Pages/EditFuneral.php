<?php

namespace App\Filament\Resources\FuneralResource\Pages;

use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\FuneralResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFuneral extends EditRecord
{
    use RedirectUrl;

    protected static string $resource = FuneralResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
