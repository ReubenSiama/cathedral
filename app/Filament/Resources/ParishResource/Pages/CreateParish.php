<?php

namespace App\Filament\Resources\ParishResource\Pages;

use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\ParishResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateParish extends CreateRecord
{
    use RedirectUrl;
    
    protected static string $resource = ParishResource::class;
}
