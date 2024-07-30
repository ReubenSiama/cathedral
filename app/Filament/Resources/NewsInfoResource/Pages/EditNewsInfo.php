<?php

namespace App\Filament\Resources\NewsInfoResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\MutateFormForTranslation;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\NewsInfoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditNewsInfo extends EditRecord
{
    use RedirectUrl, MutateFormForTranslation;

    protected static string $resource = NewsInfoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return HandleTranslation::clearData($data, ['description', 'content']);
    }

    protected function afterSave(): void
    {
        HandleTranslation::updateTranslation($this->record, $this->data, ['description', 'content']);
    }
}
