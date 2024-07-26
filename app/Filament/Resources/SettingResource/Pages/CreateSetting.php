<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Arr;

class CreateSetting extends CreateRecord
{
    use RedirectUrl;

    protected static string $resource = SettingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return HandleTranslation::clearData($data, ['description', 'value']);
    }

    protected function afterCreate(): void
    {
        HandleTranslation::createTranslation($this->record, $this->data, ['description', 'value']);
    }
}
