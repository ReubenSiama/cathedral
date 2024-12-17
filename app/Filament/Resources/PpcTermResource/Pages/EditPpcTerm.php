<?php

namespace App\Filament\Resources\PpcTermResource\Pages;

use App\Filament\Resources\PpcTermResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPpcTerm extends EditRecord
{
    protected static string $resource = PpcTermResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
