<?php

namespace App\Filament\Resources\SpiritualResourceCategoryResource\Pages;

use App\Filament\Resources\SpiritualResourceCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSpiritualResourceCategory extends CreateRecord
{
    protected static string $resource = SpiritualResourceCategoryResource::class;

    protected static bool $canCreateAnother = false;
}
