<?php

namespace App\Filament\Resources\Partners\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class PartnerForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(150),
                FileUpload::make('logo')
                    ->image()->directory('partners')->disk('public')
                    ->maxSize(1024)->imageEditor()->nullable(),
                TextInput::make('website_url')->url()->nullable()->maxLength(255),
                TextInput::make('description')->nullable()->maxLength(255),
                TextInput::make('sort_order')->numeric()->default(0),
                Toggle::make('is_active')->default(true),
            ]);
    }
}
