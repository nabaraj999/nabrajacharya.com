<?php

namespace App\Filament\Resources\Personals\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PersonalForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('brand_name')
                    ->required()
                    ->maxLength(100),
                FileUpload::make('logo_url')
                    ->label('Profile Picture')
                    ->image()
                    ->directory('teacher-profiles')
                    ->disk('public')
                    ->maxSize(2048)
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->previewable(true)
                    ->extraAttributes(['class' => 'bg-white rounded-lg shadow-sm'])
                    ->nullable()
                    ->hint('Upload a professional headshot (max 2MB).')
                    ->dehydrated(true),
                TextInput::make('facebook_url')
                    ->url()
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('instagram_url')
                    ->url()
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('github_url')
                    ->url()
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('email')
                    ->label('Email address')
                    ->email()
                    ->required()
                    ->maxLength(100),
                TextInput::make('phone_number')
                    ->tel()
                    ->maxLength(20)
                    ->default(null),
                TextInput::make('location')
                    ->maxLength(100)
                    ->default(null),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('about_me')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('profile_photo')
                    ->label('Hero Profile Photo')
                    ->image()
                    ->directory('profile-photos')
                    ->disk('public')
                    ->maxSize(4096)
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->previewable(true)
                    ->extraAttributes(['class' => 'bg-white rounded-lg shadow-sm'])
                    ->nullable()
                    ->hint('Upload a professional headshot for the Hero section.')
                    ->dehydrated(true),
                FileUpload::make('about_photo')
                    ->label('About Page Second Photo')
                    ->image()
                    ->directory('profile-photos')
                    ->disk('public')
                    ->maxSize(4096)
                    ->imageEditor()
                    ->imageCropAspectRatio('1:1')
                    ->previewable(true)
                    ->extraAttributes(['class' => 'bg-white rounded-lg shadow-sm'])
                    ->nullable()
                    ->hint('Upload a different photo for About page (separate from Hero photo).')
                    ->dehydrated(true),
                RichEditor::make('about_description')
                    ->label('About Description')
                    ->nullable()
                    ->columnSpanFull()
                    ->placeholder('Describe yourself')
                    ->helperText('Provide a detailed overview of yourself')
                    ->extraAttributes(['style' => 'min-height: 200px;']),
                TextInput::make('years_experience')
                    ->numeric()
                    ->minValue(0) // Changed from min(0) to minValue(0)
                    ->default(null),
                TextInput::make('completed_projects')
                    ->numeric()
                    ->minValue(0) // Changed from min(0) to minValue(0)
                    ->default(null),
                TextInput::make('happy_clients')
                    ->numeric()
                    ->minValue(0)
                    ->default(null),

                TextInput::make('current_company')
                    ->label('Current Company')
                    ->maxLength(150)
                    ->default(null),
                TextInput::make('current_company_url')
                    ->label('Current Company URL')
                    ->url()
                    ->maxLength(255)
                    ->default(null),
                TextInput::make('current_role')
                    ->label('Current Job Title')
                    ->maxLength(150)
                    ->default(null),
                DatePicker::make('current_role_start')
                    ->label('Role Start Date')
                    ->default(null),
                TextInput::make('linkedin_url')
                    ->label('LinkedIn URL')
                    ->url()
                    ->maxLength(255)
                    ->default(null),
            ]);
    }
}
