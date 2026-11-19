<?php

namespace App\Observers;

use App\Models\LogAktivitas;
use Illuminate\Database\Eloquent\Model;

class LogAktivitasObserver
{
    public function created(Model $model): void
    {
        LogAktivitas::catat('Menambah ' . class_basename($model) . ' #' . $model->getKey());
    }

    public function updated(Model $model): void
    {
        LogAktivitas::catat('Mengubah ' . class_basename($model) . ' #' . $model->getKey());
    }

    public function deleted(Model $model): void
    {
        LogAktivitas::catat('Menghapus ' . class_basename($model) . ' #' . $model->getKey());
    }
}
