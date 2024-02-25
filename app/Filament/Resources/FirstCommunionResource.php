<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FirstCommunionResource\Pages;
use App\Models\FirstCommunion;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FirstCommunionResource extends Resource
{
    protected static ?string $model = FirstCommunion::class;

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
                            ->default(fn () => FirstCommunion::where('year', date('Y'))->count() + 1)
                            ->numeric(),
                        Forms\Components\Select::make('year')
                            ->options(array_combine($years, $years))
                            ->default(date('Y'))
                            ->live()
                            ->searchable()
                            ->afterStateUpdated(function (Set $set, $state) {
                                $count = FirstCommunion::where('year', $state)->count();
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
                        Forms\Components\Select::make('parish_id')
                            ->relationship('parish', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),
                        Forms\Components\DatePicker::make('date_of_first_communion')
                            ->required()
                            ->native(false),
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
                Tables\Columns\TextColumn::make('first_communion_number')
                    ->label('Number')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_surname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parish.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_of_first_communion')
                    ->sortable(),
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
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListFirstCommunions::route('/'),
            'create' => Pages\CreateFirstCommunion::route('/create'),
            'edit' => Pages\EditFirstCommunion::route('/{record}/edit'),
        ];
    }
}
