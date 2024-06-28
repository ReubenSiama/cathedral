<?php

namespace App\Filament\Resources\ConfirmationResource\Pages;

use App\Filament\Common\CreateCauser;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\ConfirmationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateConfirmation extends CreateRecord
{
    use CreateCauser, RedirectUrl;

    protected static string $resource = ConfirmationResource::class;
}
