<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\LogAktivitasObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(LogAktivitasObserver::class)]

class TarifParkir extends Model
{
    use SoftDeletes;

    protected $table = 'tarif__parkirs';
    
    protected $fillable = [
        'jenis_kendaraan',
        'tarif_per_jam'
    ];

    protected $primaryKey = 'id_tarif';
}
