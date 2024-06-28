<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MassTimingResource\Pages;
use App\Models\MassTiming;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MassTimingResource extends Resource
{
    protected static ?string $model = MassTiming::class;

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('days')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('english_time')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mizo_time')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('days')
                    ->searchable(),
                Tables\Columns\TextColumn::make('english_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mizo_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageMassTimings::route('/'),
        ];
    }
}
