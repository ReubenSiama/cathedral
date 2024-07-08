<?php

namespace App\Filament\Common;

trait RedirectUrl
{
    protected function getRedirectUrl(): string
    {
        return $this->previousUrl ?? $this->getResource()::getUrl('index');
    }
}
