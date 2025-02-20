<?php

namespace App\Filament\Resources\SpiritualResourceCategoryResource\RelationManagers;

use App\Filament\Common\HandleTranslation;
use App\Filament\Common\LocaleGenerator;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class ResourcesRelationManager extends RelationManager
{
    protected static string $relationship = 'resources';

    private $originalData = [];

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make([
                    LocaleGenerator::make('title', 'default'),
                    Forms\Components\TextInput::make('url')
                        ->prefix('https://')
                        ->maxLength(255),
                        Forms\Components\Repeater::make('attachments')
                        ->schema([
                            Forms\Components\FileUpload::make('file')
                                ->acceptedFileTypes(['image/jpg', 'image/jpeg', 'image/png', 'application/pdf'])
                                ->uploadingMessage('Uploading attachment...')
                                ->maxSize(2 * 1024)
                                ->required(),
                        ])
                        ->reorderable(false)
                        ->columnSpanFull()
                        ->addActionLabel('Add Attachment')
                        ->relationship(),
                ]),
                LocaleGenerator::make('content', 'tiny')
                ->columnSpan(2),
            ])
            ->columns(3);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('url'),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
                ->createAnother(false)
                ->modalWidth('full')
                ->mutateFormDataUsing(function(array $data){
                    $this->originalData = $data;
                    return HandleTranslation::clearData($data, ['title', 'content']);
                })
                ->after(function($record){
                    HandleTranslation::createTranslation($record, $this->originalData, ['title', 'content']);
                }),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->modalWidth('full')
                ->mutateRecordDataUsing(function(array $data, $record){
                    info($record);
                    $translations = $record->translations()->get();
                    foreach ($translations as $translation) {
                        $data[$translation->key][$translation->locale] = $translation->value;
                    }

                    return $data;
                })
                ->mutateFormDataUsing(function(array $data){
                    $this->originalData = $data;
                    return HandleTranslation::clearData($data, ['title', 'content']);
                })
                ->after(function($record){
                    HandleTranslation::updateTranslation($record, $this->originalData, ['title', 'content']);
                }),
                Tables\Actions\DeleteAction::make(),
            ]);
    }
}
