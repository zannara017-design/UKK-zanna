<?php

namespace App\Filament\Resources\AreaParkirs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;

class AreaParkirForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('nama_area')
                ->options(['gedung selatan a' => 'Gedung Selatan A', 'gedung utara b' => 'Gedung Utara B'])
                ->required(),
                Select::make('kapasitas')
                ->options(['100'=> '100', '150' => '150', '70' => '70'])
                ->required(),
                TextInput::make('terisi')
                ->numeric()
                ->default(0)
                ->disabled()
                ->dehydrated(false),
            ]);
    }
}
