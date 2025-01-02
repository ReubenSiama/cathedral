<?php

namespace App\Filament\Resources;

use App\Exports\ConfirmationExport;
use App\Filament\Common\CauserDisplay;
use App\Filament\Common\DownloadCertificate;
use App\Filament\Common\ExportData;
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

    protected static ?int $navigationSort = 2;

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
                            ->label('Father\'s Name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('father_surname')
                            ->label('Father\'s Surname')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_name')
                            ->label('Mother\'s Name')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mother_surname')
                            ->label('Mother\'s Surname')
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
                            ->label('Date of Confirmation')
                            ->displayFormat(self::$dateFormat)
                            ->native(false)
                            ->required(),
                        Forms\Components\Select::make('bishop_id')
                            ->label('Minister')
                            ->relationship('bishop', 'name')
                            ->searchable()
                            ->required()
                            ->preload()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->createOptionAction(fn (Action $action) => $action
                                ->modalWidth('md')),
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->label('Date of Birth')
                            ->native(false)
                            ->displayFormat(self::$dateFormat),
                        Forms\Components\TextInput::make('place_of_birth')
                            ->label('Place of Birth'),
                    ])
                    ->columns(4),
                Forms\Components\Section::make('SPONSORS')
                    ->schema([
                        Forms\Components\TextInput::make('sponsor_1')
                            ->hiddenLabel()
                            ->prefix('1')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('sponsor_2')
                            ->hiddenLabel()
                            ->prefix('2')
                            ->maxLength(255),
                    ]),
                Forms\Components\Section::make('REMARKS')
                    ->schema([
                        Forms\Components\Textarea::make('remarks')
                            ->hiddenLabel()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ]),
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
                CauserDisplay::create(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date(self::$dateFormat)
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('causer')
                    ->relationship('causer', 'user.name')
                    ->label('Operator'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DownloadCertificate::make('confirmation.download'),
            ])
            ->defaultSort('confirmation_date', 'desc')
            ->headerActions([
                ExportData::make(ConfirmationExport::class, 'Confirmation '),
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
