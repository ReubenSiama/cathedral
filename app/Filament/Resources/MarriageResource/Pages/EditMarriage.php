<?php

namespace App\Filament\Resources\MarriageResource\Pages;

use App\Filament\Resources\MarriageResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Arr;

class EditMarriage extends EditRecord
{
    protected static string $resource = MarriageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        $data['personalDetails'] = $this->record->personalDetails->toArray();
        $data['witnesses'] = $this->record->witnesses->toArray();

        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $this->record->personalDetails[0]->update($data['personalDetails'][0]);
        $this->record->personalDetails[1]->update($data['personalDetails'][1]);
        $this->record->witnesses[0]->update($data['witnesses'][0]);
        $this->record->witnesses[1]->update($data['witnesses'][1]);
        $data = Arr::except($data, ['personalDetails', 'witnesses']);
        return $data;
    }
}
