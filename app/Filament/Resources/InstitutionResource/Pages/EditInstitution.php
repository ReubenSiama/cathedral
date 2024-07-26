<?php

namespace App\Filament\Resources\InstitutionResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\MutateFormForTranslation;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\InstitutionResource;
use Filament\Resources\Pages\EditRecord;

class EditInstitution extends EditRecord
{
    use RedirectUrl, MutateFormForTranslation;

    protected static string $resource = InstitutionResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return HandleTranslation::clearData($data, ['description', 'value']);
    }

    protected function afterSave(): void
    {
        HandleTranslation::updateTranslation($this->record, $this->data, ['description', 'value']);
    }
}
