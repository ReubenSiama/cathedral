<?php

namespace App\Filament\Resources;

use AmidEsfahani\FilamentTinyEditor\TinyEditor;
use App\Filament\Resources\BishopResource\Pages;
use App\Models\Bishop;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BishopResource extends Resource
{
    protected static ?string $model = Bishop::class;

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('description')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->maxSize(2048),
                Forms\Components\Group::make([
                    Forms\Components\Checkbox::make('is_deceased')
                        ->default(false),
                    Forms\Components\Checkbox::make('display')
                        ->default(true),
                ])
                ->columns(2),
                TinyEditor::make('bio')
                    ->maxLength(1000)
                    ->columnSpanFull(),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\ImageColumn::make('image'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->beforeFormValidated(function ($record, $action) {
                        $bishops = Bishop::where('is_current', true)
                            ->where('id', '!=', $record->id)
                            ->get();
                        if ($bishops->count() > 0) {
                            $bishops->each(function ($bishop) {
                                $bishop->update(['is_current' => false]);
                            });
                        }
                    }),
            ])
            ->reorderable('order')
            ->defaultSort('order', 'asc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageBishops::route('/'),
        ];
    }
}
