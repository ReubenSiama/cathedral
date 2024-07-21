<?php

namespace App\Filament\Resources\AssociationBranchResource\Pages;

use App\Filament\Resources\AssociationBranchResource;
use App\Filament\Resources\AssociationResource;
use App\Models\Association;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAssociationBranch extends EditRecord
{
    protected static string $resource = AssociationBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        $this->record->association_id;
        $association = Association::find($this->record->association_id);

        return AssociationResource::getUrl('edit', [$association]);
    }
}
