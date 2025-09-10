<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('service_name')
                    ->required(),
                FileUpload::make('photo')
                    ->image()
                    ->directory('services')
                    ->disk('public')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->default(null),
                RichEditor::make('description')
                    ->label('About Description')
                    ->nullable()
                    ->columnSpanFull()
                    ->placeholder('Describe yourself')
                    ->helperText('Provide a detailed overview of yourself')
                    ->extraAttributes(['style' => 'min-height: 200px;']),
                Toggle::make('is_active')
                    ->required(),

            ]);
    }
}
