<?php

namespace App\Filament\Resources\SettingResource\Pages;

use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\SettingResource;
use Filament\Resources\Pages\EditRecord;

class EditSetting extends EditRecord
{
    use RedirectUrl;

    protected static string $resource = SettingResource::class;
}
