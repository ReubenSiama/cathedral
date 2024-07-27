<?php

namespace App\Filament\Resources\ReligiousInstituteResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\MutateFormForTranslation;
use App\Filament\Resources\ReligiousInstituteResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditReligiousInstitute extends EditRecord
{
    use MutateFormForTranslation;

    protected static string $resource = ReligiousInstituteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return HandleTranslation::clearData($data, ['description', 'value']);
    }

    protected function afterSave(): void
    {
        HandleTranslation::updateTranslation($this->record, $this->data, ['description', 'value']);
    }
}
