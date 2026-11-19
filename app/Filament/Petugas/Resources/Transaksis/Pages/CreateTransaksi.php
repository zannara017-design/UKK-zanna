<?php

namespace App\Filament\Petugas\Resources\Transaksis\Pages;

use App\Filament\Petugas\Resources\Transaksis\TransaksiResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreateTransaksi extends CreateRecord
{
    protected static string $resource = TransaksiResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['id_user'] = Auth::id();

        return $data;
    }
}