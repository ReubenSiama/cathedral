<?php

namespace App\Filament\Resources;

use App\Filament\Common\DownloadCertificate;
use App\Filament\Common\NumberField;
use App\Filament\Resources\ConfirmationResource\Pages;
use App\Models\Confirmation;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ConfirmationResource extends Resource
{
    protected static ?string $model = Confirmation::class;

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
                        Forms\Components\TextInput::make('father_name')
                            ->label('Father\'s name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_surname')
                            ->label('Father\'s surname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_name')
                            ->label('Mother\'s name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_surname')
                            ->label('Mother\'s surname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('domicile')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('parish_id')
                            ->relationship('parish', 'name')
                            ->label('Place of Confirmation')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->createOptionAction(fn (Action $action) => $action
                                ->modalWidth('md')),
                        Forms\Components\DatePicker::make('confirmation_date')
                            ->displayFormat(self::$dateFormat)
                            ->native(false)
                            ->required(),
                        Forms\Components\Select::make('bishop_id')
                            ->label('Minister')
                            ->relationship('bishop', 'name')
                            ->searchable()
                            ->required()
                            ->preload(),
                        Forms\Components\TextInput::make('sponsor_1')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('sponsor_2')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->native(false)
                            ->displayFormat(self::$dateFormat),
                        Forms\Components\TextInput::make('place_of_birth'),
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
                Tables\Columns\TextColumn::make('number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('surname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('domicile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parish.name')
                    ->label('Parish/Church')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('confirmation_date')
                    ->date(self::$dateFormat)
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
                DownloadCertificate::make('confirmation.download'),
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
