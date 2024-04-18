<?php

namespace App\Filament\Common;

use Closure;
use Filament\Tables;
use Illuminate\Database\Eloquent\Model;

class DownloadCertificate
{
    protected string|Closure|null $url = null;

    public static function make($routeName) //: Tables\Actions\Action
    {
        return Tables\Actions\Action::make('download')
            ->hiddenLabel()
            ->icon('heroicon-o-eye')
            ->color('info')
            ->url(fn (Model $record) => route($routeName, $record->id));
    }
}
