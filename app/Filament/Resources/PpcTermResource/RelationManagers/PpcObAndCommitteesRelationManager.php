<?php

namespace App\Filament\Resources\PpcTermResource\RelationManagers;

use App\Enums\ObAndCommitteeType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PpcObAndCommitteesRelationManager extends RelationManager
{
    protected static string $relationship = 'ppcObAndCommittees';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->required()
                    ->options(ObAndCommitteeType::class)
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('type'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->modalWidth('md'),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()
                    ->modalWidth('md'),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
