<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('skill_name')
                    ->label('Skill Name')
                    ->required()
                    ->maxLength(50)
                    ->placeholder('Enter skill name (e.g., PHP, JavaScript)'),
              TextInput::make('proficiency')
                    ->label('Proficiency (%)')
                    ->numeric()
                    ->required()
                    ->minValue(0)
                    ->maxValue(100)
                    ->placeholder('Enter proficiency level (0-100)'),
               Select::make('category')
                    ->label('Category')
                    ->options([
                        'programming' => 'Programming',
                        'design' => 'Design',
                        'soft_skills' => 'Soft Skills',
                        'other' => 'Other',
                    ])
                    ->nullable()
                    ->placeholder('Select a category'),
            ]);
    }
}
