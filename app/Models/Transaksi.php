<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Observers\LogAktivitasObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(LogAktivitasObserver::class)]

class Transaksi extends Model
{
    protected $table = 'transaksis';
    protected $primaryKey = 'id_parkir';

    protected $fillable = [
        'id_kendaraan', 'waktu_masuk', 'waktu_keluar', 'id_tarif',
        'durasi_jam', 'biaya_total', 'status', 'id_user', 'id_area',
    ];

    protected $casts = [
        'waktu_masuk'  => 'datetime',
        'waktu_keluar' => 'datetime',
    ];

    public function kendaraan(): BelongsTo
    {
        return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id_kendaraan');
    }

    public function tarif(): BelongsTo
    {
        return $this->belongsTo(TarifParkir::class, 'id_tarif', 'id_tarif');
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area_Parkir::class, 'id_area', 'id_area');
    }

    public function petugas(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    protected static function booted(): void
{
    static::created(fn ($t) => $t->area()->increment('terisi'));

    static::updated(function ($t) {
        if ($t->wasChanged('status') && $t->status === 'keluar') {
            $t->area()->decrement('terisi');
        }
    });
}
}