<?php

namespace App\Filament\Resources\ParishPastoralCouncilResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\MutateFormForTranslation;
use App\Filament\Resources\ParishPastoralCouncilResource;
use Filament\Resources\Pages\EditRecord;

class EditParishPastoralCouncil extends EditRecord
{
    use MutateFormForTranslation;
    
    protected static string $resource = ParishPastoralCouncilResource::class;

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return HandleTranslation::clearData($data, ['description', 'value']);
    }

    protected function afterSave(): void
    {
        HandleTranslation::updateTranslation($this->record, $this->data, ['description', 'value']);
    }
}
