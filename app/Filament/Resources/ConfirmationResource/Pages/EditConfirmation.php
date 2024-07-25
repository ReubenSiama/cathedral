<?php

namespace App\Filament\Resources\ConfirmationResource\Pages;

use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\ConfirmationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfirmation extends EditRecord
{
    use RedirectUrl;
    
    protected static string $resource = ConfirmationResource::class;

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
