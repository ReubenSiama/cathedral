<?php

namespace App\Filament\Resources\ReligiousInstituteResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\ReligiousInstituteResource;
use Filament\Resources\Pages\CreateRecord;

class CreateReligiousInstitute extends CreateRecord
{
    use RedirectUrl;

    protected static string $resource = ReligiousInstituteResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return HandleTranslation::clearData($data, ['description']);
    }

    protected function afterCreate(): void
    {
        HandleTranslation::createTranslation($this->record, $this->data, ['description']);
    }
}
