<?php

namespace App\Filament\Resources\MarriageResource\Pages;

use App\Filament\Common\CreateCauser;
use App\Filament\Common\RedirectUrl;
use App\Filament\Resources\MarriageResource;
use Filament\Resources\Pages\CreateRecord;

class CreateMarriage extends CreateRecord
{
    use RedirectUrl;

    protected static string $resource = MarriageResource::class;

    protected $personalDetails = [];

    protected $witnesses = [];

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['personalDetails'][0]['type'] = 'bridegroom';
        $data['personalDetails'][1]['type'] = 'bride';

        $this->personalDetails = $data['personalDetails'];
        $this->witnesses = $data['witnesses'];

        unset($data['personalDetails']);
        unset($data['witnesses']);

        return $data;
    }

    protected function afterCreate()
    {
        $marriage = $this->record;

        $marriage->personalDetails()->createMany($this->personalDetails);
        $marriage->witnesses()->createMany($this->witnesses);

        $this->record->causer()->create([
            'modelable_type' => $this->getResource()::getModel(),
            'modelable_id' => $this->record->id,
            'user_id' => auth()->id(),
        ]);
    }
}
