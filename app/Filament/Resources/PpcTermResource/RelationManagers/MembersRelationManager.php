<?php

namespace App\Filament\Resources\PpcTermResource\RelationManagers;

use App\Enums\ObAndCommitteeRole;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MembersRelationManager extends RelationManager
{
    protected static string $relationship = 'members';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('ppc_ob_and_committee_id')
                    ->relationship('ppcObAndCommittee', 'name')
                    ->preload()
                    ->native(false)
                    ->required(),
                Forms\Components\Select::make('role')
                    ->options(ObAndCommitteeRole::class)
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ])
            ->columns(1);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('ppcObAndCommittee.name'),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('name'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                    ->modalWidth('md'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalWidth('md'),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
