<?php

namespace App\Filament\Resources\AssociationBranchResource\Pages;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\MutateFormForTranslation;
use App\Filament\Resources\AssociationBranchResource;
use App\Filament\Resources\AssociationResource;
use App\Models\Association;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssociationBranch extends EditRecord
{
    use MutateFormForTranslation;
    protected static string $resource = AssociationBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return HandleTranslation::clearData($data, ['description']);
    }

    protected function afterSave(): void
    {
        HandleTranslation::updateTranslation($this->record, $this->data, ['description']);
    }

    protected function getRedirectUrl(): string
    {
        $this->record->association_id;
        $association = Association::find($this->record->association_id);

        return AssociationResource::getUrl('edit', [$association]);
    }
}
