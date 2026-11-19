<?php

use App\Http\Controllers\StrukController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])
    ->get('/struk/{transaksi}', [StrukController::class, 'cetak'])
    ->name('struk');