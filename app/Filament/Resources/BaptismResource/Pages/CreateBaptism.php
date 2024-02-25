<?php

namespace App\Filament\Resources\BaptismResource\Pages;

use App\Filament\Resources\BaptismResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBaptism extends CreateRecord
{
    protected static string $resource = BaptismResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
