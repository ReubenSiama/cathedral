<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationGroup = 'User Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->hiddenOn('edit')
                    ->maxLength(255),
                Forms\Components\Select::make('roles')
                    ->required()
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->searchable(true),
            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->badge(),
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
                Tables\Actions\EditAction::make()
                    ->modalWidth('md'),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('Password')
                    ->modalSubmitActionLabel('Change Password')
                    ->icon('heroicon-o-lock-closed')
                    ->action(function ($record, array $data) {
                        $record->update($data);
                    })
                    ->form(function ($form, $record) {
                        return $form
                            ->schema([
                                Forms\Components\TextInput::make('password')
                                    ->label('New Password')
                                    ->password()
                                    ->required()
                                    ->confirmed()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('password_confirmation')
                                    ->label('Confirm Password')
                                    ->password()
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->columns(1);
                    })
                    ->modalWidth('sm')
                    ->after(fn () => Notification::make()
                        ->success()
                        ->body('Password changed successfully.')
                        ->send()
                    )
                    ->disabled(fn ($record) => $record->is(auth()->user())),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageUsers::route('/'),
        ];
    }
}
