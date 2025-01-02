<?php

namespace App\Filament\Resources;

use App\Enums\CveInfant;
use App\Enums\Relationship;
use App\Exports\FuneralExport;
use App\Filament\Common\CauserDisplay;
use App\Filament\Common\DownloadCertificate;
use App\Filament\Common\ExportData;
use App\Filament\Common\NumberField;
use App\Filament\Resources\FuneralResource\Pages;
use App\Models\Funeral;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FuneralResource extends Resource
{
    protected static ?string $model = Funeral::class;

    protected static ?string $navigationGroup = 'Data Entry';

    protected static string $dateFormat = 'd/m/Y';

    protected static ?int $navigationSort = 4;

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
                        Forms\Components\TextInput::make('age')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('domicile')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('date_of_death')
                            ->label('Date of Death')
                            ->displayFormat(self::$dateFormat)
                            ->native(false)
                            ->required(),
                        Forms\Components\DatePicker::make('date_of_burial')
                            ->label('Date of Burial')
                            ->displayFormat(self::$dateFormat)
                            ->native(false)
                            ->required(),
                        Forms\Components\TextInput::make('cause_of_death')
                            ->label('Cause of Death')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('place_of_burial')
                            ->label('Place of Burial')
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
                        Forms\Components\Radio::make('cve_or_infants')
                            ->label('C.V.E. or Infant')
                            ->inline(true)
                            ->inlineLabel(false)
                            ->default(CveInfant::CVE)
                            ->options(CveInfant::class)
                            ->required(),
                        Forms\Components\Textarea::make('remarks')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])
                    ->columns(3),
                Forms\Components\Section::make('RELATIVES')
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\Select::make('relationship')
                                    ->options(Relationship::class)
                                    ->native(false)
                                    ->live(),
                            ])
                            ->columnspan(1),
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('parent_spouse_name.0')
                                    ->hiddenLabel()
                                    ->prefix(fn (Get $get) => match ($get('relationship')) {
                                        Relationship::Parent->value => 'Father\'s Name',
                                        Relationship::Spouse->value => 'Spouse\'s Name',
                                        default => 'Name'
                                    })
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('parent_spouse_name.1')
                                    ->hidden(fn ($get) => $get('relationship') == Relationship::Spouse->value)
                                    ->hiddenLabel()
                                    ->prefix(fn (Get $get) => match ($get('relationship')) {
                                        Relationship::Parent->value => 'Mother\'s Name',
                                        Relationship::Spouse->value => 'Spouse\'s Name',
                                        default => 'Name',
                                    })
                                    ->maxLength(255),
                            ])
                            ->columns(1)
                            ->columnspan(3),
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
                Tables\Columns\TextColumn::make('parent_spouse_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('age')
                    ->searchable(),
                Tables\Columns\TextColumn::make('domicile')
                    ->searchable(),
                Tables\Columns\TextColumn::make('date_of_death')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('date_of_burial')
                    ->date('d-m-Y')
                    ->sortable(),
                Tables\Columns\TextColumn::make('cause_of_death')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cve_or_infants')
                    ->searchable(),
                Tables\Columns\TextColumn::make('place_of_burial')
                    ->searchable(),
                Tables\Columns\TextColumn::make('priest.full_name')
                    ->label('Minister of Exsequics')
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
                DownloadCertificate::make('funeral.download'),
            ])
            ->defaultSort('date_of_burial', 'desc')
            ->headerActions([
                ExportData::make(FuneralExport::class, 'Funeral'),
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
