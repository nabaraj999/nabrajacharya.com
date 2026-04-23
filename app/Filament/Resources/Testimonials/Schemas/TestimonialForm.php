<?php

namespace App\Filament\Resources\Testimonials\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TestimonialForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('client_name')->required()->maxLength(150),
                TextInput::make('client_email')->email()->required()->maxLength(255),
                TextInput::make('company_name')->maxLength(150)->nullable(),
                TextInput::make('client_role')->label('Client Role')->maxLength(150)->nullable(),
                FileUpload::make('client_photo')
                    ->label('Client Photo')
                    ->image()
                    ->directory('testimonials')
                    ->disk('public')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->nullable(),
                Select::make('rating')
                    ->options([
                        5 => '5 - Excellent',
                        4 => '4 - Very Good',
                        3 => '3 - Good',
                        2 => '2 - Fair',
                        1 => '1 - Poor',
                    ])
                    ->required()
                    ->default(5),
                Toggle::make('is_approved')
                    ->label('Approved')
                    ->default(false),
                DateTimePicker::make('approved_at')
                    ->seconds(false)
                    ->nullable()
                    ->helperText('Set approval date/time if this testimonial is approved.'),
                Textarea::make('message')
                    ->required()
                    ->rows(6)
                    ->columnSpanFull(),
            ]);
    }
}
