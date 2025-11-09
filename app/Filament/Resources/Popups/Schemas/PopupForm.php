<?php

namespace App\Filament\Resources\Popups\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PopupForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->placeholder('e.g. Black Friday 70% OFF!'),
                FileUpload::make('image_path')
                    ->image()
                    ->imageEditor()
                    ->imageEditorAspectRatios([
                        '16:9',
                        '4:3',
                        '1:1',
                    ])
                    ->directory('popups')
                    ->disk('public')
                    ->visibility('public')
                    ->label('Popup Image')
                    ->helperText('Recommended: 800x600px or 1200x900px for best quality')
                    ->required(),
                TextInput::make('url')
                    ->url()
                    ->prefix('https://')
                    ->placeholder('yoursite.com/sale')
                    ->label('Target URL')
                    ->helperText('Where users go when they click the popup'),
                TextInput::make('button_text')
                    ->required()
                    ->default('Shop Now')
                    ->maxLength(50),
                Toggle::make('is_active')
                    ->label('Active')
                    ->default(false)
                    ->helperText('Only one active popup will show at a time'),
                DateTimePicker::make('starts_at')
                    ->label('Start Date')
                    ->default(now())
                    ->helperText('Leave empty = show immediately'),
                DateTimePicker::make('ends_at')
                    ->label('End Date')
                    ->after('starts_at')
                    ->helperText('Leave empty = show forever'),
            ]);
    }
}
