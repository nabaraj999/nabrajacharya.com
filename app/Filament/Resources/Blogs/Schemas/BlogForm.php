<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(180)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set, callable $get): void {
                        if (blank($get('slug'))) {
                            $set('slug', Str::slug((string) $state));
                        }
                    }),

                TextInput::make('slug')
                    ->required()
                    ->maxLength(180)
                    ->unique(ignoreRecord: true)
                    ->helperText('Used in the public blog URL.'),

                TextInput::make('focus_keyword')
                    ->label('Focus Keyword')
                    ->maxLength(255)
                    ->nullable(),

                FileUpload::make('featured_image')
                    ->label('Featured Image')
                    ->image()
                    ->directory('blogs')
                    ->disk('public')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->nullable(),

                Textarea::make('excerpt')
                    ->rows(4)
                    ->maxLength(300)
                    ->nullable()
                    ->helperText('Short summary for listings and search snippets.')
                    ->columnSpanFull(),

                RichEditor::make('content')
                    ->label('Blog Content')
                    ->nullable()
                    ->columnSpanFull()
                    ->placeholder('Write the full blog post content')
                    ->extraAttributes(['style' => 'min-height: 220px;']),

                Textarea::make('meta_title')
                    ->label('Meta Title')
                    ->rows(2)
                    ->maxLength(255)
                    ->nullable(),

                Textarea::make('meta_description')
                    ->label('Meta Description')
                    ->rows(3)
                    ->maxLength(320)
                    ->nullable(),

                TextInput::make('meta_keywords')
                    ->label('Meta Keywords')
                    ->maxLength(255)
                    ->nullable(),

                Repeater::make('faqs')
                    ->label('FAQs')
                    ->schema([
                        TextInput::make('question')
                            ->required()
                            ->maxLength(255),
                        Textarea::make('answer')
                            ->required()
                            ->rows(4)
                            ->maxLength(1000),
                    ])
                    ->defaultItems(0)
                    ->collapsed()
                    ->reorderableWithButtons()
                    ->columnSpanFull()
                    ->helperText('Optional FAQ pairs for this article.'),

                DateTimePicker::make('published_at')
                    ->label('Publish Date')
                    ->seconds(false)
                    ->default(now())
                    ->nullable()
                    ->helperText('Visible on the public site only when active and not scheduled in the future.'),

                TextInput::make('comment_count')
                    ->label('Comment Count')
                    ->numeric()
                    ->default(0)
                    ->minValue(0),

                TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),

                Toggle::make('is_active')
                    ->default(true)
                    ->helperText('Turn off to hide this post from the public site.'),
            ]);
    }
}
