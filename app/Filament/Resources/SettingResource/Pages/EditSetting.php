<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Arr;

class EditSetting extends EditRecord
{
    use RedirectUrl;

    protected static string $resource = SettingResource::class;

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $translations = $this->record->translations()->get();

        foreach ($translations as $translation) {
            $data[$translation->key][$translation->locale] = $translation->value;
        }

        return $data;
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
