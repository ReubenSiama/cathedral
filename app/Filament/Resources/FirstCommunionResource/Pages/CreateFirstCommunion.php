<?php

namespace App\Filament\Resources\FirstCommunionResource\Pages;

use App\Filament\Resources\FirstCommunionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFirstCommunion extends CreateRecord
{
    protected static string $resource = FirstCommunionResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
