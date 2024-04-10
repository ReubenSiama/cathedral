<?php

namespace App\Filament\Resources;

use App\Filament\Common\NumberField;
use App\Filament\Resources\BaptismResource\Pages;
use App\Models\Baptism;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BaptismResource extends Resource
{
    protected static ?string $model = Baptism::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static $dateFormat = 'd/m/Y';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Information')
                    ->schema([
                        NumberField::create(),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('surname')
                                    ->required()
                                    ->maxLength(50),
                            ])
                            ->columns(2),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\DatePicker::make('date_of_baptism')
                                    ->required()
                                    ->displayFormat(self::$dateFormat)
                                    ->native(false),
                                Forms\Components\DatePicker::make('date_of_birth')
                                    ->displayFormat(self::$dateFormat)
                                    ->native(false),
                            ])
                            ->columns(2),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Radio::make('is_infant')
                                    ->live()
                                    ->inline()
                                    ->inlineLabel(false)
                                    ->options([
                                        1 => 'Infant',
                                        0 => 'Not-Infant',
                                    ])
                                    ->default(true),
                                Forms\Components\TextInput::make('age')
                                    ->numeric()
                                    ->visible(fn (Get $get) => ! $get('is_infant')),

                            ])
                            ->columns(2),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Radio::make('gender')
                                    ->inline()
                                    ->default('male')
                                    ->inlineLabel(false)
                                    ->options([
                                        'male' => 'Male',
                                        'female' => 'Female',
                                    ])
                                    ->required(),
                                Forms\Components\TextInput::make('place_of_birth')
                                    ->label('Place of Birth / Domicile')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\Select::make('parish_id')
                                    ->relationship('parish', 'name')
                                    ->required()
                                    ->preload()
                                    ->searchable()
                                    ->label('Place of Baptism')
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->createOptionAction(fn (Action $action) => $action
                                        ->modalWidth('md')),
                                Forms\Components\Select::make('priest_id')
                                    ->label('Minister')
                                    ->searchable()
                                    ->preload()
                                    ->relationship('priest', 'full_name')
                                    ->required()
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
                            ])
                            ->columns(4)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Parents')
                    ->schema([
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('father_name')
                                    ->label('Father\'s Name')
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('father_surname')
                                    ->label('Father\'s Surname')
                                    ->maxLength(50),
                            ])
                            ->columns(2),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('mother_name')
                                    ->label('Mother\'s Name')
                                    ->maxLength(50),
                                Forms\Components\TextInput::make('mother_surname')
                                    ->label('Mother\'s Surname')
                                    ->maxLength(50),
                            ])
                            ->columns(2),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\Select::make('nationality_id')
                                    ->relationship('nationality', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->label('Father\'s Nationality')
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required()
                                            ->maxLength(255),
                                    ])
                                    ->createOptionAction(fn (Action $action) => $action
                                        ->modalWidth('md')),
                                Forms\Components\TextInput::make('father_occupation')
                                    ->label('Father\'s Occupation')
                                    ->maxLength(50),
                            ])
                            ->columns(2),
                        Forms\Components\TextInput::make('parents_domicile')
                            ->label('Parents\' Domicile')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('god_father')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('god_mother')
                            ->maxLength(255),
                    ])
                    ->columns(2),
                Forms\Components\Section::make('Remarks')
                    ->schema([
                        Forms\Components\Textarea::make('remarks')
                            ->hiddenLabel()
                            ->maxLength(255),
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
                Tables\Columns\TextColumn::make('date_of_baptism')
                    ->date(self::$dateFormat)
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->date(self::$dateFormat)
                    ->sortable(),
                Tables\Columns\TextColumn::make('age')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('place_of_birth')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('gender')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_name')
                    ->label('Father\'s Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_surname')
                    ->label('Father\'s Surname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_name')
                    ->label('Mother\'s Name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_surname')
                    ->label('Mother\'s Surname')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->hiddenLabel(),
                Tables\Actions\Action::make('download')
                    ->hiddenLabel()
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn (Baptism $baptism) => route('baptism.download', $baptism)),
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
            'index' => Pages\ListBaptisms::route('/'),
            'create' => Pages\CreateBaptism::route('/create'),
            'edit' => Pages\EditBaptism::route('/{record}/edit'),
        ];
    }
}
