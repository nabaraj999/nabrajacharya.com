<?php

namespace App\Filament\Resources\Certifications\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class CertificationsForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Certification Details')
                    ->description('Enter the details of your professional certification.')
                    ->schema([
                        TextInput::make('title')
                            ->required()
                            ->maxLength(200)
                            ->placeholder('e.g. AWS Certified Solutions Architect'),
                        TextInput::make('issuer')
                            ->required()
                            ->maxLength(150)
                            ->placeholder('e.g. Amazon Web Services (AWS)'),
                        Grid::make(2)
                            ->schema([
                                DatePicker::make('issue_date')
                                    ->required()
                                    ->label('Issue Date'),
                                DatePicker::make('expiry_date')
                                    ->label('Expiry Date (Optional)'),
                            ]),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('credential_id')
                                    ->label('Credential ID')
                                    ->maxLength(100),
                                TextInput::make('credential_url')
                                    ->label('Credential URL')
                                    ->url()
                                    ->maxLength(255),
                            ]),
                        Textarea::make('description')
                            ->nullable()
                            ->rows(3)
                            ->columnSpanFull(),
                    ])->columns(1),

                Section::make('Visuals & Settings')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Certificate Image / Badge')
                            ->image()
                            ->directory('certifications')
                            ->disk('public')
                            ->imageEditor()
                            ->maxSize(4048)
                            ->nullable(),
                        Grid::make(2)
                            ->schema([
                                TextInput::make('sort_order')
                                    ->numeric()
                                    ->default(0),
                                Toggle::make('is_active')
                                    ->label('Active')
                                    ->default(true),
                            ]),
                    ]),
            ]);
    }
}
