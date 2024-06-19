<?php

namespace App\Filament\Resources\InstitutionResource\Pages;

use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\InstitutionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateInstitution extends CreateRecord
{
    use RedirectUrl;

    protected static string $resource = InstitutionResource::class;
}
