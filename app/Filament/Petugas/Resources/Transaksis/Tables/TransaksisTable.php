<?php

namespace App\Filament\Petugas\Resources\Transaksis\Tables;

use App\Models\Transaksi;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class TransaksisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kendaraan.plat_nomor')->label('Plat Nomor')->searchable(),
                TextColumn::make('area.nama_area')->label('Area'),
                TextColumn::make('waktu_masuk')->dateTime('d M Y H:i')->sortable(),
                TextColumn::make('waktu_keluar')->dateTime('d M Y H:i')->placeholder('-'),
                TextColumn::make('durasi_jam')->suffix(' jam')->placeholder('-'),
                TextColumn::make('biaya_total')->money('IDR', locale: 'id')->placeholder('-'),
                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state) => $state === 'masuk' ? 'warning' : 'success'),
            ])
            ->defaultSort('waktu_masuk', 'desc')
            ->recordActions([
                Action::make('keluar')
                    ->label('Keluar')
                    ->icon('heroicon-o-arrow-right-start-on-rectangle')
                    ->color('success')
                    ->requiresConfirmation()
                    ->visible(fn (Transaksi $record) => $record->status === 'masuk')
                    ->action(function (Transaksi $record) {
                        $keluar = now();
                        $jam = max(1, (int) ceil($record->waktu_masuk->diffInMinutes($keluar) / 60));

                        $record->update([
                            'waktu_keluar' => $keluar,
                            'durasi_jam'   => $jam,
                            'biaya_total'  => $jam * $record->tarif->tarif_per_jam,
                            'status'       => 'keluar',
                        ]);
                    }),

                Action::make('struk')
                    ->label('Cetak Struk')
                    ->icon('heroicon-o-printer')
                    ->visible(fn (Transaksi $record) => $record->status === 'keluar')
                    ->url(fn (Transaksi $record) => route('struk', $record), shouldOpenInNewTab: true),

                EditAction::make()
                    ->visible(fn (Transaksi $record) => $record->status === 'masuk'),
            ]);
    }
}