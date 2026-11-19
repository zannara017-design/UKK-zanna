<?php

namespace App\Filament\Resources\Kendaraans\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class KendaraansTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('plat_nomor')
                    ->searchable(),
                TextColumn::make('jenis_kendaraan')
                    ->searchable(),
                TextColumn::make('warna')
                    ->searchable(),
                TextColumn::make('pemilik')
                    ->searchable(),
                TextColumn::make('id_user')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                DeleteAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}