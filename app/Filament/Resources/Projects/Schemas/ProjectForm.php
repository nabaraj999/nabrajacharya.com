<?php

namespace App\Filament\Resources\Projects\Schemas;

use App\Models\Skill;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(100)
                    ->live(onBlur: true)
                    ->afterStateUpdated(function ($state, callable $set, callable $get): void {
                        if (blank($get('slug'))) {
                            $set('slug', Str::slug((string) $state));
                        }
                    }),
                TextInput::make('slug')
                    ->required()
                    ->maxLength(160)
                    ->unique(ignoreRecord: true)
                    ->helperText('Used in the portfolio detail URL.'),
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

                RichEditor::make('description')
                    ->label('Description')
                    ->nullable()
                    ->columnSpanFull()
                    ->placeholder('Describe the project')
                    ->helperText('Provide a detailed overview of the project')
                    ->extraAttributes(['style' => 'min-height: 200px;']),

                Select::make('skills')
                    ->label('Technologies / Skills Used')
                    ->relationship('skills', 'skill_name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->columnSpanFull()
                    ->helperText('Select all technologies used to build this project'),
            ]);
    }
}
