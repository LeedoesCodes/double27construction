<?php

namespace App\Filament\Resources\SiteSettings\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class SiteSettingForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('company_name')
                    ->required()
                    ->default('Double 27 Construction Supply'),
                TextInput::make('tagline'),
                Textarea::make('about')
                    ->columnSpanFull(),
                Textarea::make('vision')
                    ->columnSpanFull(),
                Textarea::make('mission')
                    ->columnSpanFull(),
                TextInput::make('phone')
                    ->tel(),
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('head_office'),
                TextInput::make('sub_office'),
                TextInput::make('facebook')
                    ->label('Facebook page URL')
                    ->url(),
                FileUpload::make('hero_image')
                    ->label('Homepage hero image')
                    ->image()
                    ->directory('site')
                    ->imageEditor(),
            ]);
    }
}
