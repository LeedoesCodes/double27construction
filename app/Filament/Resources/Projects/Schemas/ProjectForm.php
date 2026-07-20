<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('client')
                    ->required()
                    ->maxLength(255),
                TextInput::make('name')
                    ->label('Project name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('scope')
                    ->helperText('e.g. Sand and Gravel Delivery, Road concreting'),
                TextInput::make('location'),
                TextInput::make('year')
                    ->helperText('e.g. 2024 or 2022-2024'),
                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('projects')
                    ->imageEditor(),
                TextInput::make('sort_order')
                    ->helperText('Lower numbers show first.')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_featured')
                    ->label('Feature on homepage')
                    ->default(false),
            ]);
    }
}
