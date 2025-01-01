<?php

namespace App\Filament\Common;

use Filament\Forms;
use Filament\Tables;
use Maatwebsite\Excel\Facades\Excel;

class ExportData
{
    protected static string $dateFormat = 'd/m/Y';

    public static function make($exportMethod, $fileName)
    {
        return Tables\Actions\Action::make('export')
            ->form([
                Forms\Components\TextInput::make('filename')
                    ->label('Filename')
                    ->default(fn () => $fileName.' Export('.date('d-m-Y').')')
                    ->required(),
                Forms\Components\DatePicker::make('from')
                    ->label('From')
                    ->displayFormat(self::$dateFormat)
                    ->native(false)
                    ->required(),
                Forms\Components\DatePicker::make('to')
                    ->label('To')
                    ->displayFormat(self::$dateFormat)
                    ->native(false)
                    ->required(),
            ])
            ->modalWidth('md')
            ->action(function (array $data) use ($exportMethod) {
                $funeralExport = new $exportMethod(
                    $data['from'].' 00:00:00',
                    $data['to'].' 23:59:59'
                );

                return Excel::download($funeralExport, $data['filename'].'.xlsx');
            });
    }
}
