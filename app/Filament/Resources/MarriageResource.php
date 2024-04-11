<?php

namespace App\Filament\Resources;

use App\Filament\Common\NumberField;
use App\Filament\Resources\MarriageResource\Pages;
use App\Models\Marriage;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MarriageResource extends Resource
{
    protected static ?string $model = Marriage::class;

    protected static ?string $navigationGroup = 'Data Entry';

    protected static string $dateFormat = 'd/m/Y';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()
                    ->schema([
                        NumberField::create(),
                        Forms\Components\DatePicker::make('date_of_marriage')
                            ->native(false)
                            ->displayFormat(self::$dateFormat)
                            ->required(),
                        Forms\Components\TextInput::make('place')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date_of_first_announcement')
                            ->native(false)
                            ->displayFormat(self::$dateFormat)
                            ->required(),
                        Forms\Components\DatePicker::make('date_of_second_announcement')
                            ->native(false)
                            ->displayFormat(self::$dateFormat)
                            ->required(),
                        Forms\Components\DatePicker::make('date_of_third_announcement')
                            ->native(false)
                            ->displayFormat(self::$dateFormat)
                            ->required(),
                        Forms\Components\TextInput::make('impediment_dispensation')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('priest_id')
                            ->relationship('priest', 'full_name')
                            ->required()
                            ->native(false)
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
                            ->createOptionAction(fn (Action $action) => $action
                                ->modalWidth('md')),
                        Forms\Components\Select::make('parish_priest_id')
                            ->required()
                            ->relationship('parishPriest', 'full_name')
                            ->native(false)
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
                            ->createOptionAction(fn (Action $action) => $action
                                ->modalWidth('md')),
                        Forms\Components\FileUpload::make('nuptial_form')
                            ->acceptedFileTypes(['application/pdf'])
                            ->required(),
                    ])
                    ->columns(3),
                Forms\Components\Section::make('Personal Details')
                    ->schema([
                        Forms\Components\Section::make('Bridegroom')
                            ->schema([
                                Forms\Components\TextInput::make('personalDetails.0.name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('personalDetails.0.surname')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('personalDetails.0.father')
                                    ->label('Father\'s Name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('personalDetails.0.mother')
                                    ->label('Mother\'s Name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('personalDetails.0.date_of_birth')
                                    ->native(false)
                                    ->displayFormat(self::$dateFormat)
                                    ->required(),
                                Forms\Components\Select::make('personalDetails.0.nationality_id')
                                    ->label('Nationality')
                                    ->options(
                                        \App\Models\Nationality::pluck('name', 'id')->toArray()
                                    )
                                    ->required()
                                    ->native(false),
                                Forms\Components\TextInput::make('personalDetails.0.domicle')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('personalDetails.0.occupation')
                                    ->maxLength(255),
                                Forms\Components\Radio::make('personalDetails.0.is_married')
                                    ->label('Bachelor/Married')
                                    ->inline()
                                    ->inlineLabel(false)
                                    ->default(false)
                                    ->options([
                                        0 => 'Bachelor',
                                        1 => 'Married',
                                    ])
                                    ->required(),
                                Forms\Components\FileUpload::make('personalDetails.0.signature')
                                    ->acceptedFileTypes(['image/png'])
                                    ->required(),
                            ])
                            ->columns(3),
                        Forms\Components\Section::make('Bride')
                            ->schema([
                                Forms\Components\TextInput::make('personalDetails.1.name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('personalDetails.1.surname')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('personalDetails.1.father')
                                    ->label('Father\'s Name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('personalDetails.1.mother')
                                    ->label('Mother\'s Name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\DatePicker::make('personalDetails.1.date_of_birth')
                                    ->native(false)
                                    ->displayFormat(self::$dateFormat)
                                    ->required(),
                                Forms\Components\Select::make('personalDetails.1.nationality_id')
                                    ->label('Nationality')
                                    ->options(
                                        \App\Models\Nationality::pluck('name', 'id')->toArray()
                                    )
                                    ->required()
                                    ->native(false),
                                Forms\Components\TextInput::make('personalDetails.1.domicle')
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('personalDetails.1.occupation')
                                    ->maxLength(255),
                                Forms\Components\Radio::make('personalDetails.1.is_married')
                                    ->label('Virgin/Married')
                                    ->inline()
                                    ->inlineLabel(false)
                                    ->default(false)
                                    ->options([
                                        0 => 'Virgin',
                                        1 => 'Married',
                                    ])
                                    ->required(),
                                Forms\Components\FileUpload::make('personalDetails.1.signature')
                                    ->acceptedFileTypes(['image/png'])
                                    ->required(),
                            ])
                            ->columns(3),
                    ]),
                Forms\Components\Section::make('Witness')
                    ->schema([
                        Forms\Components\Section::make('First Witness')
                            ->schema([
                                Forms\Components\TextInput::make('witnesses.0.name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('witnesses.0.surname')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('witnesses.0.domicile')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\FileUpload::make('witnesses.0.signature')
                                    ->required()
                                    ->acceptedFileTypes(['image/png']),
                            ])
                            ->columns(3),
                        Forms\Components\Section::make('Second Witness')
                            ->schema([
                                Forms\Components\TextInput::make('witnesses.1.name')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('witnesses.1.surname')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('witnesses.1.domicile')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\FileUpload::make('witnesses.1.signature')
                                    ->required()
                                    ->acceptedFileTypes(['image/png']),
                            ])
                            ->columns(3),
                    ]),
                Forms\Components\Section::make('Remarks')
                    ->schema([
                        Forms\Components\Textarea::make('remarks')
                            ->placeholder('Add any additional information here.')
                            ->hiddenLabel()
                            ->maxLength(65535),
                    ])
                    ->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_marriage')
                    ->date(self::$dateFormat)
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_of_first_announcement')
                    ->date(self::$dateFormat)
                    ->sortable(),
                Tables\Columns\TextColumn::make('impediment_dispensation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('priest.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('parishPriest.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('nuptial_form'),
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
            'index' => Pages\ListMarriages::route('/'),
            'create' => Pages\CreateMarriage::route('/create'),
            'edit' => Pages\EditMarriage::route('/{record}/edit'),
        ];
    }
}
