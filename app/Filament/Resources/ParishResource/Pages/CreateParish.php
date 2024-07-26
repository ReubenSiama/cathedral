<?php

namespace App\Filament\Resources\ParishResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\ParishResource;
use Filament\Resources\Pages\CreateRecord;

class CreateParish extends CreateRecord
{
    use RedirectUrl;

    protected static string $resource = ParishResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return HandleTranslation::clearData($data, ['short_description', 'about']);
    }

    protected function afterCreate(): void
    {
        HandleTranslation::createTranslation($this->record, $this->data, ['short_description', 'about']);
    }
}
