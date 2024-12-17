<?php

namespace App\Filament\Resources;

use App\Filament\Common\LocaleGenerator;
use App\Filament\Resources\ParishPastoralCouncilResource\Pages;
use App\Filament\Resources\ParishPastoralCouncilResource\RelationManagers;
use App\Models\ParishPastoralCouncil;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ParishPastoralCouncilResource extends Resource
{
    protected static ?string $model = ParishPastoralCouncil::class;

    protected static ?string $navigationGroup = 'Website';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Heading')
                    ->required()
                    ->maxLength(255),
                LocaleGenerator::make('description', 'tiny'),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListParishPastoralCouncils::route('/'),
            'create' => Pages\CreateParishPastoralCouncil::route('/create'),
            'edit' => Pages\EditParishPastoralCouncil::route('/{record}/edit'),
        ];
    }
}
