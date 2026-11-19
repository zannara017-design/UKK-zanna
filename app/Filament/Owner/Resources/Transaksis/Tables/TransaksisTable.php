<?php

namespace App\Filament\Owner\Resources\Transaksis\Tables;

use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TransaksisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kendaraan.plat_nomor')->label('Plat Nomor')->searchable(),
                TextColumn::make('kendaraan.jenis_kendaraan')->label('Jenis')->badge(),
                TextColumn::make('area.nama_area')->label('Area')->searchable(),
                TextColumn::make('waktu_masuk')->dateTime('d M Y H:i')->sortable(),
                TextColumn::make('waktu_keluar')->dateTime('d M Y H:i')->placeholder('-'),
                TextColumn::make('durasi_jam')->suffix(' jam')->placeholder('-'),
                TextColumn::make('biaya_total')
                    ->money('IDR', locale: 'id')
                    ->placeholder('-')
                    ->summarize(Sum::make()->money('IDR', locale: 'id')->label('Total')),
                TextColumn::make('status')->badge(),
                TextColumn::make('petugas.name')->label('Petugas'),
            ])
            ->defaultSort('waktu_masuk', 'desc')
            ->filters([
                SelectFilter::make('status')->options(['masuk' => 'Masuk', 'keluar' => 'Keluar']),
                Filter::make('tanggal')
                    ->schema([
                        DatePicker::make('dari'),
                        DatePicker::make('sampai'),
                    ])
                    ->query(fn (Builder $query, array $data) => $query
                        ->when($data['dari'], fn ($q, $d) => $q->whereDate('waktu_masuk', '>=', $d))
                        ->when($data['sampai'], fn ($q, $d) => $q->whereDate('waktu_masuk', '<=', $d))),
            ])
            ->recordActions([])
            ->toolbarActions([]);
    }
}