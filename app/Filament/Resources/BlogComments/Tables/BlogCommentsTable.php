<?php

namespace App\Filament\Resources\BlogComments\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class BlogCommentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('blog.title')
                    ->label('Blog')
                    ->searchable()
                    ->limit(35),
                TextColumn::make('author_name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('author_email')
                    ->label('Email')
                    ->searchable()
                    ->limit(28),
                TextColumn::make('comment')
                    ->limit(60)
                    ->wrap(),
                IconColumn::make('is_approved')
                    ->label('Approved')
                    ->boolean(),
                IconColumn::make('admin_reply')
                    ->label('Replied')
                    ->boolean(fn ($record) => filled($record->admin_reply)),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                TernaryFilter::make('is_approved')
                    ->label('Approval'),
            ])
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
