<?php

namespace App\Filament\Resources\BlogComments\Schemas;

use App\Models\Blog;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class BlogCommentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Comment details')
                    ->schema([
                        Select::make('blog_id')
                            ->label('Blog Post')
                            ->options(Blog::query()->orderByDesc('published_at')->pluck('title', 'id'))
                            ->searchable()
                            ->required(),

                        Toggle::make('is_approved')
                            ->label('Approved')
                            ->default(false),

                        TextInput::make('author_name')
                            ->required()
                            ->maxLength(120),

                        TextInput::make('author_email')
                            ->email()
                            ->required()
                            ->maxLength(190),

                        TextInput::make('author_website')
                            ->url()
                            ->maxLength(255)
                            ->nullable(),

                        Textarea::make('comment')
                            ->required()
                            ->rows(6)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),

                Section::make('Admin reply')
                    ->schema([
                        Textarea::make('admin_reply')
                            ->label('Reply')
                            ->rows(5)
                            ->nullable()
                            ->helperText('Write your reply as the site owner or admin.')
                            ->columnSpanFull(),

                        DateTimePicker::make('replied_at')
                            ->seconds(false)
                            ->nullable(),
                    ])
                    ->columns(2),
            ]);
    }
}
