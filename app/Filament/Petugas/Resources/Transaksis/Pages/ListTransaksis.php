<?php

namespace App\Filament\Petugas\Resources\Transaksis\Pages;

use App\Filament\Petugas\Resources\Transaksis\TransaksiResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTransaksis extends ListRecords
{
    protected static string $resource = TransaksiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
