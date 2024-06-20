<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\ParishResource\Pages;
use App\Filament\Resources\ParishResource\RelationManagers;
use App\Models\Parish;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParishResource extends Resource
{
    protected static ?string $model = Parish::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('address')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('banner')
                    ->image()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('short_description')
                    ->maxLength(2000)
                    ->columnSpanFull(),
                TinyEditor::make('about')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('banner')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParishes::route('/'),
            'create' => Pages\CreateParish::route('/create'),
            'view' => Pages\ViewParish::route('/{record}'),
            'edit' => Pages\EditParish::route('/{record}/edit'),
        ];
    }
}
