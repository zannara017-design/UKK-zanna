<?php

namespace App\Filament\Petugas\Resources\Transaksis\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class TransaksiInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('kendaraan.plat_nomor')->label('Plat Nomor'),
                TextEntry::make('kendaraan.jenis_kendaraan')->label('Jenis'),
                TextEntry::make('area.nama_area')->label('Area'),
                TextEntry::make('waktu_masuk')->dateTime('d M Y H:i'),
                TextEntry::make('waktu_keluar')->dateTime('d M Y H:i')->placeholder('-'),
                TextEntry::make('durasi_jam')->suffix(' jam')->placeholder('-'),
                TextEntry::make('biaya_total')->money('IDR', locale: 'id')->placeholder('-'),
                TextEntry::make('status')->badge(),
                TextEntry::make('petugas.name')->label('Petugas'),
            ]);
    }
}