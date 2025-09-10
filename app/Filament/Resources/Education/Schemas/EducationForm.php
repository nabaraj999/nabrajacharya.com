<?php

namespace App\Filament\Resources\Education\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EducationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
               TextInput::make('degree')
                    ->label('Degree')
                    ->required()
                    ->maxLength(100),
                TextInput::make('institution')
                    ->label('Institution')
                    ->required()
                    ->maxLength(100),
                FileUpload::make('image_url')
                    ->label('Certificate or Logo')
                    ->image()
                    ->directory('education-images')
                    ->disk('public')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->nullable()
                    ->hint('Upload a degree certificate or institution logo (max 2MB).'),
                TextInput::make('start_year')
                    ->label('Start Year')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y'))
                    ->nullable(),
                TextInput::make('end_year')
                    ->label('End Year')
                    ->numeric()
                    ->minValue(1900)
                    ->maxValue(date('Y'))
                    ->nullable(),
                Select::make('status')
                    ->options([
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                    ])
                    ->default('completed')
                    ->required(),
                Textarea::make('description')
                    ->label('Description')
                    ->columnSpanFull()
                    ->nullable(),
            ]);
    }
}
