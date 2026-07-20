<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Select::make('category')
                    ->required()
                    ->default('Sand')
                    ->options([
                        'Sand' => 'Sand',
                        'Gravel' => 'Gravel',
                        'Crushed Stone' => 'Crushed Stone',
                        'Aggregates' => 'Aggregates (general)',
                    ]),
                Textarea::make('description')
                    ->rows(4)
                    ->columnSpanFull(),
                FileUpload::make('image')
                    ->image()
                    ->directory('products')
                    ->imageEditor(),
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
