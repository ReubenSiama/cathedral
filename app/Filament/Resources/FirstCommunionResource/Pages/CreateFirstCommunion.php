<?php

namespace App\Filament\Resources\FirstCommunionResource\Pages;

use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\FirstCommunionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFirstCommunion extends CreateRecord
{
    use RedirectUrl;

    protected static string $resource = FirstCommunionResource::class;
}
