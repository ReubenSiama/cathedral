<?php

namespace App\Filament\Resources\BaptismResource\Pages;

use App\Filament\Resources\BaptismResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBaptism extends EditRecord
{
    protected static string $resource = BaptismResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\Action::make('View Certificate')
                ->url(fn ($record) => route('baptism.download', $record->getKey())),
        ];
    }
}
