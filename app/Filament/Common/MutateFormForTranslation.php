<?php

namespace App\Filament\Common;

trait MutateFormForTranslation
{
    protected function mutateFormDataBeforeFill(array $data): array
    {
        $translations = $this->record->translations()->get();
        foreach ($translations as $translation) {
            $data[$translation->key][$translation->locale] = $translation->value;
        }

        return $data;
    }
}