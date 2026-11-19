<?php

namespace App\Http\Controllers;

use App\Models\LogAktivitas;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class StrukController extends Controller
{
    public function cetak(Transaksi $transaksi)
    {
        abort_if(
            Auth::user()->role === 'petugas' && $transaksi->id_user !== Auth::id(),
            403
        );

        LogAktivitas::catat('Mencetak struk parkir #' . $transaksi->id_parkir);

        $transaksi->load(['kendaraan', 'area', 'tarif', 'petugas']);

        return view('struk', compact('transaksi'));
    }
}