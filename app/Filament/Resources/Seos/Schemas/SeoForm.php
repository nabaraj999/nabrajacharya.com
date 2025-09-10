<?php

namespace App\Filament\Resources\Seos\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SeoForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('page_name')
                    ->required(),
                TextInput::make('meta_title')
                   ->maxLength(200)
                            ->helperText('Recommended: 60 characters or less')
                            ->default(null),
                Textarea::make('meta_description')
                    ->maxLength(360)
                            ->rows(4)
                            ->helperText('Recommended: 160 characters or less')
                            ->columnSpanFull(),
                Textarea::make('meta_keywords')
                    ->rows(3)
                            ->helperText('Comma-separated keywords')
                            ->columnSpanFull(),
                TextInput::make('meta_author')
                     ->maxLength(255)
                            ->default(null),
                TextInput::make('canonical_url')
                    ->url()
                    ->default(null),
                TextInput::make('robots_directives')
                    ->required()
                            ->maxLength(255)
                            ->default('index, follow')
                            ->helperText('e.g., index, follow, noarchive'),
                TextInput::make('og_title')
                    ->maxLength(90)
                            ->helperText('Recommended: 90 characters or less')
                            ->default(null),
                Textarea::make('og_description')
                    ->maxLength(200)
                            ->rows(4)
                            ->helperText('Recommended: 200 characters or less')
                            ->columnSpanFull(),
                FileUpload::make('og_image')
                    ->image()
                            ->imageEditor()
                            ->disk('public')
                            ->directory('seo/og')
                            ->acceptedFileTypes(['image/jpeg', 'image/png'])
                            ->maxSize(2048)
                            ->helperText('Recommended: 1200x630 pixels')
                            ->label('OG Image'),
                TextInput::make('twitter_title')
                    ->default(null),
                Textarea::make('twitter_description')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('twitter_image')
                    ->image()
                    ->imageEditor()
                    ->disk('public')
                    ->directory('seo/twitter')
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->maxSize(2048)
                    ->helperText('Recommended: 1200x630 pixels')
                    ->label('Twitter Image'),
                Textarea::make('structured_data_json')
                    ->maxLength(360)
                    ->rows(4)
                    ->helperText('Recommended: 160 characters or less')
                    ->columnSpanFull(),
            ]);
    }
}
