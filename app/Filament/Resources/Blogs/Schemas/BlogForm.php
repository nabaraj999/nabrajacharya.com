<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(180),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(180)
                    ->unique(ignoreRecord: true),

                TextInput::make('focus_keyword')
                    ->label('Focus Keyword')
                    ->maxLength(255)
                    ->placeholder('e.g. seo specialist in nepal')
                    ->nullable(),

                FileUpload::make('featured_image')
                    ->label('Featured Image')
                    ->image()
                    ->directory('blogs')
                    ->disk('public')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->nullable(),

                DateTimePicker::make('published_at')
                    ->seconds(false)
                    ->nullable(),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->default(true),

                Textarea::make('excerpt')
                    ->rows(3)
                    ->maxLength(300)
                    ->nullable()
                    ->columnSpanFull(),

                RichEditor::make('content')
                    ->label('Blog Content')
                    ->nullable()
                    ->columnSpanFull()
                    ->placeholder('Write the full blog post content')
                    ->extraAttributes(['style' => 'min-height: 220px;']),
            ]);
    }
}
