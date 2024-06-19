<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSetting extends CreateRecord
{
    use RedirectUrl;

    protected static string $resource = SettingResource::class;
}
