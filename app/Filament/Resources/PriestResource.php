<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriestResource\Pages;
use App\Models\Priest;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PriestResource extends Resource
{
    protected static ?string $model = Priest::class;

    protected static ?string $navigationGroup = 'Master Data';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('surname')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('picture')
                    ->maxSize(1024)
                    ->columnSpanFull()
                    ->image(),
                Forms\Components\Textarea::make('bio')
                    ->maxLength(255)
                    ->columnSpanFull(),
                Forms\Components\Radio::make('designation')
                    ->options([
                        'parish_priest' => 'Parish Priest',
                        'assistant_priest' => 'Assistant Priest',
                    ])
                    ->inline()
                    ->hiddenLabel()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('designation')
                    ->label('Role')
                    ->formatStateUsing(fn ($state) => match ($state) {
                        'parish_priest' => 'Parish Priest',
                        'assistant_priest' => 'Assistant Priest',
                    })
                    ->badge(),
                Tables\Columns\ImageColumn::make('picture'),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->modalWidth('md')
                    ->before(function ($record, $data) {
                        if ($data['designation']) {
                            $priests = Priest::where('designation', $data['designation'])
                                ->where('id', '!=', $record->id)
                                ->get();

                            if ($priests->count() > 0) {
                                $priests->each(function ($priest) {
                                    $priest->update(['designation' => null]);
                                });
                            }
                        }
                    }),
            ])
            ->defaultSort('designation', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePriests::route('/'),
        ];
    }
}
