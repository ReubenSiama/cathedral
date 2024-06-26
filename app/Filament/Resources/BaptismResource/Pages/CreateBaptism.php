<?php

namespace App\Filament\Resources\BaptismResource\Pages;

use App\Filament\Common\CreateCauser;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\BaptismResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBaptism extends CreateRecord
{
    use CreateCauser, RedirectUrl;

    protected static string $resource = BaptismResource::class;
}
