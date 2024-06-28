<?php

namespace App\Filament\Resources\BaptismResource\Pages;

use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\BaptismResource;
use Filament\Resources\Pages\CreateRecord;

class CreateBaptism extends CreateRecord
{
    use RedirectUrl;

    protected static string $resource = BaptismResource::class;

    protected function afterCreate()
    {
        $this->record->causer()->create([
            'modelable_type' => BaptismResource::getModel(),
            'modelable_id' => $this->record->id,
            'user_id' => auth()->id(),
        ]);
    }
}
