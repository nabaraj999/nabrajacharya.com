<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Blog editor')
                    ->persistTabInQueryString()
                    ->tabs([
                        Tab::make('Content')
                            ->schema([
                                Section::make()
                                    ->schema([
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

                                        Textarea::make('excerpt')
                                            ->rows(4)
                                            ->maxLength(300)
                                            ->nullable()
                                            ->helperText('Use a concise summary for click-through rate and search snippets.')
                                            ->columnSpanFull(),

                                        RichEditor::make('content')
                                            ->label('Blog Content')
                                            ->nullable()
                                            ->columnSpanFull()
                                            ->placeholder('Write the full blog post content')
                                            ->extraAttributes(['style' => 'min-height: 220px;']),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('FAQ')
                            ->schema([
                                Section::make('Article FAQs')
                                    ->description('Add search-friendly FAQs for this post. These will appear on the blog page and in FAQ structured data.')
                                    ->schema([
                                        Repeater::make('faqs')
                                            ->label('FAQs')
                                            ->schema([
                                                TextInput::make('question')
                                                    ->required()
                                                    ->maxLength(255)
                                                    ->columnSpanFull(),
                                                Textarea::make('answer')
                                                    ->required()
                                                    ->rows(4)
                                                    ->maxLength(1000)
                                                    ->columnSpanFull(),
                                            ])
                                            ->defaultItems(0)
                                            ->collapsed()
                                            ->reorderableWithButtons()
                                            ->itemLabel(fn (array $state): ?string => $state['question'] ?? null)
                                            ->addActionLabel('Add FAQ')
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Tab::make('SEO')
                            ->schema([
                                Section::make('Search metadata')
                                    ->schema([
                                        TextInput::make('meta_title')
                                            ->label('Meta Title')
                                            ->maxLength(255)
                                            ->nullable()
                                            ->helperText('Recommended: 50 to 60 characters'),

                                        TextInput::make('meta_keywords')
                                            ->label('Meta Keywords')
                                            ->maxLength(255)
                                            ->nullable()
                                            ->helperText('Comma-separated supporting terms'),

                                        Textarea::make('meta_description')
                                            ->label('Meta Description')
                                            ->rows(3)
                                            ->maxLength(320)
                                            ->nullable()
                                            ->helperText('Recommended: 140 to 160 characters')
                                            ->columnSpanFull(),
                                    ])
                                    ->columns(2),
                            ]),

                        Tab::make('Publishing')
                            ->schema([
                                Section::make('Visibility')
                                    ->schema([
                                        DateTimePicker::make('published_at')
                                            ->seconds(false)
                                            ->nullable(),

                                        TextInput::make('comment_count')
                                            ->label('Comment Count')
                                            ->numeric()
                                            ->default(0)
                                            ->minValue(0),

                                        TextInput::make('sort_order')
                                            ->numeric()
                                            ->default(0),

                                        Toggle::make('is_active')
                                            ->default(true),
                                    ])
                                    ->columns(2),
                            ]),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
