<?php

namespace App\Filament\Resources\AssociationBranchResource\Pages;

use App\Filament\Resources\AssociationBranchResource;
use App\Filament\Resources\AssociationResource;
use App\Models\Association;
use Filament\Resources\Pages\CreateRecord;

class CreateAssociationBranch extends CreateRecord
{
    protected static string $resource = AssociationBranchResource::class;

    protected function getRedirectUrl(): string
    {
        $this->record->association_id;
        $association = Association::find($this->record->association_id);

        return AssociationResource::getUrl('edit', [$association]);
    }
}
