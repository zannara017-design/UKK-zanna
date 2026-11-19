<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Observers\LogAktivitasObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(LogAktivitasObserver::class)]

class Area_Parkir extends Model
{
    use SoftDeletes;

    protected $table = 'area__parkirs';   // sesuaikan dengan nama tabel yang sebenarnya
    protected $primaryKey = 'id_area';

    protected $fillable = [
        'nama_area',
        'kapasitas',
        'terisi',
    ];
} 