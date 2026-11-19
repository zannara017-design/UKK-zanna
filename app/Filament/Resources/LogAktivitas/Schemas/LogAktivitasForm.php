<?php

namespace App\Filament\Resources\LogAktivitas\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class LogAktivitasForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_user')
                    ->label('user')
                    ->relationship('petugas', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                TextInput::make('aktivitas')
                    ->required(),
                DateTimePicker::make('waktu_aktivitas')
                    ->required(),
            ]);
    }
    
}
