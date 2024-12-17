<?php

namespace App\Filament\Resources\ParishPastoralCouncilResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Resources\ParishPastoralCouncilResource;
use Filament\Resources\Pages\CreateRecord;

class CreateParishPastoralCouncil extends CreateRecord
{
    protected static string $resource = ParishPastoralCouncilResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return HandleTranslation::clearData($data, ['description']);
    }

    protected function afterCreate(): void
    {
        HandleTranslation::createTranslation($this->record, $this->data, ['description']);
    }
}
