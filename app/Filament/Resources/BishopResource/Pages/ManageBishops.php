<?php

namespace App\Filament\Resources\BishopResource\Pages;

use App\Filament\Resources\BishopResource;
use App\Models\Bishop;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageBishops extends ManageRecords
{
    protected static string $resource = BishopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->modalWidth('md')
                ->createAnother(false)
                ->beforeFormValidated(function ($action){
                    $bishops = Bishop::where('is_current', true)->get();
                    if($bishops->count() > 0){
                        $bishops->each(function($bishop){
                            $bishop->update(['is_current' => false]);
                        });
                    }
                }),
        ];
    }
}
