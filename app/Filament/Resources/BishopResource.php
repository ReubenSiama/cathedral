<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BishopResource\Pages;
use App\Models\Bishop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BishopResource extends Resource
{
    protected static ?string $model = Bishop::class;

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->maxSize(2048),
                Forms\Components\Textarea::make('bio')
                    ->maxLength(255),
                Forms\Components\Checkbox::make('is_current')
                    ->default(false),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('is_current')
                    ->label('Current')
                    ->boolean(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalWidth('md')
                    ->beforeFormValidated(function ($record, $action) {
                        $bishops = Bishop::where('is_current', true)
                            ->where('id', '!=', $record->id)
                            ->get();
                        if ($bishops->count() > 0) {
                            $bishops->each(function ($bishop) {
                                $bishop->update(['is_current' => false]);
                            });
                        }
                    }),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBishops::route('/'),
        ];
    }
}
