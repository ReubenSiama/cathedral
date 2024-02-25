<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BaptismResource\Pages;
use App\Models\Baptism;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BaptismResource extends Resource
{
    protected static ?string $model = Baptism::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $years = range(date('Y'), 1900);

        return $form
            ->schema([
                Forms\Components\Section::make('Information')
                    ->schema([
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
                        Forms\Components\Group::make([
                            Forms\Components\TextInput::make('number')
                                ->required()
                                ->minValue(1)
                                ->default(fn () => Baptism::where('year', date('Y'))->count() + 1)
                                ->integer(),
                            Forms\Components\Select::make('year')
                                ->searchable()
                                ->options(array_combine($years, $years))
                                ->placeholder('Select a year')
                                ->default(date('Y'))
                                ->live()
                                ->afterStateUpdated(function (Set $set, $state) {
                                    $count = Baptism::where('year', $state)->count();
                                    $set('number', $count + 1);
                                })
                                ->required(),
                        ])
                            ->columns(2),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\DatePicker::make('date_of_baptism')
                                    ->required()
                                    ->native(false),
                                Forms\Components\DatePicker::make('date_of_birth')
                                    ->native(false),
                            ])
                            ->columns(2),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('age')
                                    ->numeric(),
                                Forms\Components\Radio::make('gender')
                                    ->inline()
                                    ->default('male')
                                    ->inlineLabel(false)
                                    ->options([
                                        'male' => 'Male',
                                        'female' => 'Female',
                                    ])
                                    ->required(),

                            ])
                            ->columns(2),
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('place_of_birth')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('place_of_baptism')
                                    ->required()
                                    ->maxLength(255),
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
                            ->columns(3)
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
                                Forms\Components\TextInput::make('father_nationality')
                                    ->label('Father\'s Nationality')
                                    ->maxLength(50),
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
                Tables\Columns\TextColumn::make('baptism_number')
                    ->label('Number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_baptism')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_of_birth')
                    ->date()
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
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_surname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mother_surname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_nationality')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parents_domicile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('father_occupation')
                    ->searchable(),
                Tables\Columns\TextColumn::make('god_father')
                    ->searchable(),
                Tables\Columns\TextColumn::make('god_mother')
                    ->searchable(),
                Tables\Columns\TextColumn::make('place_of_baptism')
                    ->searchable(),
                Tables\Columns\TextColumn::make('minister')
                    ->searchable(),
                Tables\Columns\TextColumn::make('remarks')
                    ->searchable(),
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
            'index' => Pages\ListBaptisms::route('/'),
            'create' => Pages\CreateBaptism::route('/create'),
            'edit' => Pages\EditBaptism::route('/{record}/edit'),
        ];
    }
}
