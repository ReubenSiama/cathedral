<?php

namespace App\Filament\Resources\PpcTermResource\Pages;

use App\Filament\Resources\PpcTermResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPpcTerms extends ListRecords
{
    protected static string $resource = PpcTermResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
