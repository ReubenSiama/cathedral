<?php

namespace App\Filament\Resources\FuneralResource\Pages;

use App\Filament\Resources\FuneralResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFuneral extends CreateRecord
{
    protected static string $resource = FuneralResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
