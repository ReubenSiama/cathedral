<?php

namespace App\Filament\Resources\InstitutionResource\Pages;

use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\InstitutionResource;
use Filament\Resources\Pages\EditRecord;

class EditInstitution extends EditRecord
{
    use RedirectUrl;

    protected static string $resource = InstitutionResource::class;
}
