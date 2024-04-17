<?php

namespace App\Filament\Resources;

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
                        Forms\Components\Select::make('parish_id')
                            ->relationship('parish', 'name')
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
                            ->required()
                            ->displayFormat('d/m/Y')
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
                    ->date('d/m/Y')
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
