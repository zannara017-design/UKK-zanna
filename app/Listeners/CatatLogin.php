<?php

namespace App\Listeners;

use App\Models\LogAktivitas;
use Illuminate\Auth\Events\Login;

class CatatLogin
{
    public function handle(Login $event): void
    {
        LogAktivitas::catat('Login sebagai ' . $event->user->role, $event->user->getAuthIdentifier());
    }
}