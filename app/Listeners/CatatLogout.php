<?php

namespace App\Listeners;

use App\Models\LogAktivitas;
use Illuminate\Auth\Events\Logout;

class CatatLogout
{
    public function handle(Logout $event): void
    {
        if ($event->user) {
            LogAktivitas::catat('Logout', $event->user->getAuthIdentifier());
        }
    }
}