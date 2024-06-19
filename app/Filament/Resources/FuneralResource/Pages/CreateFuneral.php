<?php

namespace App\Filament\Resources\FuneralResource\Pages;

use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\FuneralResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFuneral extends CreateRecord
{
    use RedirectUrl;

    protected static string $resource = FuneralResource::class;
}
