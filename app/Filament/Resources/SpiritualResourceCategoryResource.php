<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SpiritualResourceCategoryResource\Pages;
use App\Filament\Resources\SpiritualResourceCategoryResource\RelationManagers;
use App\Models\SpiritualResourceCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SpiritualResourceCategoryResource extends Resource
{
    protected static ?string $model = SpiritualResourceCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Spiritual Resource';

    protected static ?string $navigationGroup = 'Website';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\ResourcesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSpiritualResourceCategories::route('/'),
            'create' => Pages\CreateSpiritualResourceCategory::route('/create'),
            'view' => Pages\ViewSpiritualResourceCategory::route('/{record}'),
            'edit' => Pages\EditSpiritualResourceCategory::route('/{record}/edit'),
        ];
    }
}
