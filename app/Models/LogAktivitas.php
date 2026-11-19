<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogAktivitas extends Model
{
    protected $table = 'log_aktivitas';
    protected $primaryKey = 'id_log';

    protected $fillable = [
        'id_user',
        'aktivitas',
        'waktu_aktivitas'
    ];

    public function petugas(): BelongsTo
    {
    return $this->belongsTo(User::class, 'id_user');
    }

protected function casts(): array
{
    return ['waktu_aktivitas' => 'datetime'];
}

public static function catat(string $aktivitas, ?int $idUser = null): void
{
    $idUser ??= Auth::id();

    if (! $idUser) {
        return;
    }

    static::create([
        'id_user' => $idUser,
        'aktivitas' => $aktivitas,
        'waktu_aktivitas' => now(),
    ]);
}
}
