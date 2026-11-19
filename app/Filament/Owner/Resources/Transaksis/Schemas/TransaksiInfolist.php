<?php

namespace App\Filament\Owner\Resources\Transaksis\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TransaksiInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('id_kendaraan')
                    ->numeric(),
                TextEntry::make('waktu_masuk')
                    ->dateTime(),
                TextEntry::make('waktu_keluar')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('id_tarif')
                    ->numeric(),
                TextEntry::make('durasi_jam')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('biaya_total')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('status')
                    ->badge(),
                TextEntry::make('id_user')
                    ->numeric(),
                TextEntry::make('id_area')
                    ->numeric(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
