<?php

namespace App\Filament\Resources;

use App\Filament\Common\NumberField;
use App\Filament\Resources\FuneralResource\Pages;
use App\Models\Funeral;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FuneralResource extends Resource
{
    protected static ?string $model = Funeral::class;

    protected static ?string $navigationGroup = 'Data Entry';

    protected static string $dateFormat = 'd/m/Y';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        NumberField::create('number'),
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('surname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('parent_spouse_name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('age')
                            ->numeric()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('domicile')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date_of_death')
                            ->displayFormat(self::$dateFormat)
                            ->native(false)
                            ->required(),
                        Forms\Components\DatePicker::make('date_of_burial')
                            ->displayFormat(self::$dateFormat)
                            ->native(false)
                            ->required(),
                        Forms\Components\TextInput::make('cause_of_death')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('cve_or_infants')
                            ->label('C.V.E. or Infants')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('place_of_burial')
                            ->maxLength(255),
                        Forms\Components\Select::make('priest_id')
                            ->relationship('priest', 'full_name')
                            ->label('Minister of Exsequics')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('surname')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->createOptionAction(
                                fn (Action $action) => $action
                                    ->modalWidth('md'),
                            ),
                        Forms\Components\Textarea::make('remarks')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent_spouse_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')
                    ->searchable(),
                Tables\Columns\TextColumn::make('domicile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_death')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_of_burial')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('cause_of_death')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cve_or_infants')
                    ->searchable(),
                Tables\Columns\TextColumn::make('place_of_burial')
                    ->searchable(),
                Tables\Columns\TextColumn::make('priest.name')
                    ->numeric()
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
            'index' => Pages\ListFunerals::route('/'),
            'create' => Pages\CreateFuneral::route('/create'),
            'edit' => Pages\EditFuneral::route('/{record}/edit'),
        ];
    }
}
