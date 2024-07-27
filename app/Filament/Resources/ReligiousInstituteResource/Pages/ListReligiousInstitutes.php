<?php

namespace App\Filament\Resources\ReligiousInstituteResource\Pages;

use App\Filament\Resources\ReligiousInstituteResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListReligiousInstitutes extends ListRecords
{
    protected static string $resource = ReligiousInstituteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
