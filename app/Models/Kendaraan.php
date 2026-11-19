<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Observers\LogAktivitasObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(LogAktivitasObserver::class)]

class Kendaraan extends Model
{
    protected $table = 'kendaraans'; // sesuaikan dengan nama tabel sebenarnya
    protected $primaryKey = 'id_kendaraan';

    protected $fillable = [
        'plat_nomor',
        'jenis_kendaraan',
        'warna',
        'pemilik',
        'id_user',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}