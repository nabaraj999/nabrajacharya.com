<?php

namespace App\Filament\Resources\Galleries\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class GalleryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(180),

                FileUpload::make('image_path')
                    ->label('Gallery Image')
                    ->required()
                    ->image()
                    ->directory('gallery')
                    ->disk('public')
                    ->maxSize(4096)
                    ->imageEditor(),

                TextInput::make('category')
                    ->maxLength(100)
                    ->nullable(),

                TextInput::make('external_url')
                    ->url()
                    ->maxLength(255)
                    ->nullable(),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->default(true),

                Textarea::make('caption')
                    ->rows(3)
                    ->nullable()
                    ->columnSpanFull(),
            ]);
    }
}
