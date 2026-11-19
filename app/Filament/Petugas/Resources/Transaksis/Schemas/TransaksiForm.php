<?php

namespace App\Filament\Petugas\Resources\Transaksis\Schemas;

use App\Models\TarifParkir;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;

class TransaksiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('id_kendaraan')
                    ->label('Kendaraan')
                    ->relationship('kendaraan', 'plat_nomor')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('id_area')
                    ->label('Area Parkir')
                    ->relationship('area', 'nama_area')
                    ->preload()
                    ->required(),

                Select::make('id_tarif')
                    ->label('Tarif')
                    ->options(
                        fn () => TarifParkir::all()->mapWithKeys(fn ($t) => [
                            $t->id_tarif => ucfirst($t->jenis_kendaraan) . ' - Rp ' . number_format($t->tarif_per_jam, 0, ',', '.') . '/jam',
                        ])
                    )
                    ->required(),

                DateTimePicker::make('waktu_masuk')
                    ->default(now())
                    ->required(),

                Hidden::make('status')->default('masuk'),

Hidden::make('id_user')
    ->default(fn () => Auth::id()),
            ]);
    }
}