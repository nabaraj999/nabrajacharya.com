<?php

namespace App\Filament\Resources\Blogs\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BlogsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('featured_image')->label('Image'),
                TextColumn::make('title')->searchable()->sortable()->limit(40),
                TextColumn::make('slug')->searchable()->limit(35),
                TextColumn::make('focus_keyword')->label('Focus Keyword')->searchable()->limit(28),
                TextColumn::make('published_at')->dateTime()->sortable(),
                TextColumn::make('comment_count')->label('Comments')->sortable(),
                TextColumn::make('faqs')
                    ->label('FAQs')
                    ->formatStateUsing(fn ($state) => is_array($state) ? count($state) : 0),
                IconColumn::make('is_active')->boolean(),
                TextColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('published_at', 'desc')
            ->filters([])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
