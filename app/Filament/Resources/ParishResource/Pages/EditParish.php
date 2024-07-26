<?php

namespace App\Filament\Resources\ParishResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\MutateFormForTranslation;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\ParishResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditParish extends EditRecord
{
    use MutateFormForTranslation, RedirectUrl;

    protected static string $resource = ParishResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
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
