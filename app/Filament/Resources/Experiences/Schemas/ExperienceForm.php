<?php

namespace App\Filament\Resources\Experiences\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ExperienceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_name')->required()->maxLength(150),
                TextInput::make('position')->required()->maxLength(150),
                TextInput::make('company_url')->url()->nullable()->maxLength(255),
                FileUpload::make('company_logo')
                    ->image()->directory('experiences')->disk('public')
                    ->maxSize(1024)->imageEditor()->nullable(),
                TextInput::make('location')->nullable()->maxLength(100)->placeholder('e.g. Australia (Remote)'),
                Select::make('employment_type')
                    ->options([
                        'Full-time'  => 'Full-time',
                        'Part-time'  => 'Part-time',
                        'Contract'   => 'Contract',
                        'Freelance'  => 'Freelance',
                        'Internship' => 'Internship',
                    ])->nullable(),
                DatePicker::make('start_date')->required(),
                DatePicker::make('end_date')->nullable()->helperText('Leave empty if this is your current job'),
                Toggle::make('is_current')->label('Currently Working Here')->default(false),
                TextInput::make('sort_order')->numeric()->default(0),
                Toggle::make('is_active')->default(true),
                Textarea::make('description')->nullable()->columnSpanFull()->rows(4),
            ]);
    }
}
