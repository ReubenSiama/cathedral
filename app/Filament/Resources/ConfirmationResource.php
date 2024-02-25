<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConfirmationResource\Pages;
use App\Models\Confirmation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConfirmationResource extends Resource
{
    protected static ?string $model = Confirmation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $years = range(date('Y'), 1900);

        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('number')
                            ->required()
                            ->minValue(1)
                            ->default(fn () => Confirmation::where('year', date('Y'))->count() + 1)
                            ->numeric(),
                        Forms\Components\Select::make('year')
                            ->default(date('Y'))
                            ->searchable()
                            ->options(array_combine($years, $years))
                            ->live()
                            ->afterStateUpdated(function (Set $set, $state) {
                                $count = Confirmation::where('year', $state)->count();
                                $set('number', $count + 1);
                            })
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('surname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_surname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_surname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('domicile')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('parish_id')
                            ->relationship('parish', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\DatePicker::make('confirmation_date')
                            ->native(false)
                            ->required(),
                        Forms\Components\Select::make('bishop_id')
                            ->label('Minister')
                            ->relationship('bishop', 'name')
                            ->searchable()
                            ->required()
                            ->preload(),
                        Forms\Components\TextInput::make('sponsor')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->native(false),
                        Forms\Components\TextInput::make('place_of_birth'),
                        Forms\Components\TextInput::make('place_of_confirmation')
                            ->required(),
                        Forms\Components\Textarea::make('remarks')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])
                    ->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('confirmation_number')
                    ->label('Number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('domicile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parish.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('confirmation_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('bishop.name')
                    ->label('Minister')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListConfirmations::route('/'),
            'create' => Pages\CreateConfirmation::route('/create'),
            'edit' => Pages\EditConfirmation::route('/{record}/edit'),
        ];
    }
}
