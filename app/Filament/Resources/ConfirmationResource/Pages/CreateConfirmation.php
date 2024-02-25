<?php

namespace App\Filament\Resources\ConfirmationResource\Pages;

use App\Filament\Resources\ConfirmationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateConfirmation extends CreateRecord
{
    protected static string $resource = ConfirmationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
