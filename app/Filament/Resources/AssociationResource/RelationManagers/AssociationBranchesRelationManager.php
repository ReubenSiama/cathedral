<?php

namespace App\Filament\Resources\AssociationResource\RelationManagers;

use App\Filament\Resources\AssociationBranchResource;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AssociationBranchesRelationManager extends RelationManager
{
    protected static string $relationship = 'associationBranches';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\ImageColumn::make('image'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->url(fn ($livewire) => AssociationBranchResource::getUrl('create', ['ownerRecord' => $livewire->ownerRecord->getKey()]))
                    ->label('New Branch'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->url(fn ($record) => AssociationBranchResource::getUrl('edit', [$record])),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
