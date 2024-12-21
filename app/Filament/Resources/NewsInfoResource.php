<?php

namespace App\Filament\Resources;

use App\Filament\Common\LocaleGenerator;
use App\Filament\Resources\NewsInfoResource\Pages;
use App\Models\NewsInfo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NewsInfoResource extends Resource
{
    protected static ?string $model = NewsInfo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\FileUpload::make('cover_image')
                    ->image(),
                LocaleGenerator::make('description', 'textarea')
                ->columnSpanFull(),
                LocaleGenerator::make('content', 'tiny')
                ->columnSpanFull(),
                Forms\Components\Repeater::make('attachments')
                    ->schema([
                        Forms\Components\FileUpload::make('file')
                            ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png', 'application/pdf'])
                            ->uploadingMessage('Uploading attachment...')
                            ->maxSize(2 * 1024)
                            ->required(),
                        Forms\Components\TextInput::make('name')
                            ->maxLength(255),
                    ])
                    ->reorderable(false)
                    ->columnSpanFull()
                    ->addActionLabel('Add Attachment')
                    ->relationship(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('cover_image'),
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
            'index' => Pages\ListNewsInfos::route('/'),
            'create' => Pages\CreateNewsInfo::route('/create'),
            'edit' => Pages\EditNewsInfo::route('/{record}/edit'),
        ];
    }
}
