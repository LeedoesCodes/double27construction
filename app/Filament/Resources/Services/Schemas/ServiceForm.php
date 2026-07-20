<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('services')
                    ->imageEditor(),
                TextInput::make('icon')
                    ->label('Icon name (optional)')
                    ->helperText('Heroicon name, e.g. heroicon-o-truck. Leave blank if unsure.'),
                TextInput::make('sort_order')
                    ->helperText('Lower numbers show first.')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Show on website')
                    ->default(true),
            ]);
    }
}
