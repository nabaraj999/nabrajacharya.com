<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(100),
                FileUpload::make('image_url')
                    ->label('Project Image')
                    ->image()
                    ->directory('project-images')
                    ->disk('public')
                    ->maxSize(2048)
                    ->nullable(),
                TextInput::make('project_url')
                    ->url()
                    ->maxLength(255)
                    ->nullable(),
                DatePicker::make('project_start_date')
                    ->label('Start Date')
                    ->nullable(),
                DatePicker::make('completion_date')
                    ->label('Completion Date')
                    ->nullable(),
                Select::make('status')
                    ->options([
                        'in_progress' => 'In Progress',
                        'completed' => 'Completed',
                        'on_hold' => 'On Hold',
                    ])
                    ->default('in_progress')
                    ->required(),
                Textarea::make('description')
                    ->columnSpanFull()
                    ->nullable(),
            ]);
    }
}
