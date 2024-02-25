<?php

namespace App\Filament\Resources\FirstCommunionResource\Pages;

use App\Filament\Resources\FirstCommunionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFirstCommunion extends EditRecord
{
    protected static string $resource = FirstCommunionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
