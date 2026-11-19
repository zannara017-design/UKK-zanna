<?php

namespace App\Filament\Owner\Resources\Transaksis\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class TransaksiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('id_kendaraan')
                    ->required()
                    ->numeric(),
                DateTimePicker::make('waktu_masuk')
                    ->required(),
                DateTimePicker::make('waktu_keluar'),
                TextInput::make('id_tarif')
                    ->required()
                    ->numeric(),
                TextInput::make('durasi_jam')
                    ->numeric(),
                TextInput::make('biaya_total')
                    ->numeric(),
                Select::make('status')
                    ->options(['masuk' => 'Masuk', 'keluar' => 'Keluar'])
                    ->default('masuk')
                    ->required(),
                TextInput::make('id_user')
                    ->required()
                    ->numeric(),
                TextInput::make('id_area')
                    ->required()
                    ->numeric(),
            ]);
    }
}
