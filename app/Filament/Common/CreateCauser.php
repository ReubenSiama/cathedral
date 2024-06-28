<?php

namespace App\Filament\Common;

trait CreateCauser
{
    protected function afterCreate()
    {
        $this->record->causer()->create([
            'modelable_type' => $this->getResource()::getModel(),
            'modelable_id' => $this->record->id,
            'user_id' => auth()->id(),
        ]);
    }
}
