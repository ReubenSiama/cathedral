<?php

namespace App\Filament\Resources\AssociationBranchResource\Pages;

use App\Filament\Resources\AssociationBranchResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAssociationBranches extends ListRecords
{
    protected static string $resource = AssociationBranchResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
