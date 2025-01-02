<?php

namespace App\Filament\Resources;

use App\Exports\FirstCommunionExport;
use App\Filament\Common\CauserDisplay;
use App\Filament\Common\ExportData;
use App\Filament\Common\NumberField;
use App\Filament\Resources\FirstCommunionResource\Pages;
use App\Models\FirstCommunion;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FirstCommunionResource extends Resource
{
    protected static ?string $model = FirstCommunion::class;

    protected static ?string $navigationGroup = 'Data Entry';

    protected static string $dateFormat = 'd/m/Y';

    protected static ?int $navigationSort = 1;

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
                        Forms\Components\DatePicker::make('date_of_birth')
                            ->label('Date of Birth')
                            ->displayFormat(self::$dateFormat)
                            ->native(false),
                        Forms\Components\TextInput::make('place_of_birth')
                            ->label('Place of Birth')
                            ->maxLength(100),
                        Forms\Components\DatePicker::make('date_of_baptism')
                            ->label('Date of Baptism')
                            ->displayFormat(self::$dateFormat)
                            ->native(false),
                        Forms\Components\Select::make('place_of_baptism')
                            ->label('Place of Baptism')
                            ->relationship('placeOfBaptism', 'name')
                            ->native(false)
                            ->searchable()
                            ->preload(),
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
                        Forms\Components\Select::make('priest_id')
                            ->relationship('priest', 'full_name')
                            ->label('Minister')
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
                        Forms\Components\Select::make('parish_id')
                            ->relationship('parish', 'name')
                            ->label('Place')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('name')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->createOptionAction(
                                fn (Action $action) => $action
                                    ->modalWidth('md'),
                            ),
                        Forms\Components\DatePicker::make('date_of_first_communion')
                            ->label('Date of First Communion')
                            ->required()
                            ->displayFormat(self::$dateFormat)
                            ->native(false),
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255)
                            ->columnSpan(2),
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
                    ->date(self::$dateFormat)
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
                Tables\Actions\Action::make('download')
                    ->hiddenLabel()
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->url(fn (FirstCommunion $firstCommunion) => route('first.communion.download', $firstCommunion)),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('date_of_first_communion', 'desc')
            ->headerActions([
                ExportData::make(FirstCommunionExport::class, 'First Communion'),
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
