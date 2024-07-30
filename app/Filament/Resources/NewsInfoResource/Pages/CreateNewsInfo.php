<?php

namespace App\Filament\Resources\NewsInfoResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\NewsInfoResource;
use Filament\Resources\Pages\CreateRecord;

class CreateNewsInfo extends CreateRecord
{
    use RedirectUrl;

    protected static string $resource = NewsInfoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return HandleTranslation::clearData($data, ['description', 'content']);
    }

    protected function afterCreate(): void
    {
        HandleTranslation::createTranslation($this->record, $this->data, ['description', 'content']);
    }
}
