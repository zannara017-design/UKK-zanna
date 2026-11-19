<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasName;
use Filament\Panel;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Observers\LogAktivitasObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;

#[ObservedBy(LogAktivitasObserver::class)]
// #[Fillable(['nama_lengkap', 'username', 'password', 'role', 'status_aktif'])]
// #[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements FilamentUser, HasName
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status_aktif'
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
            'status_aktif' => 'boolean',
        ];
    }

    public function getFilamentName(): string
    {
        return $this->name;
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if (! $this->status_aktif) {
            return false;
        }

        return $this->role === $panel->getId()
            && in_array($this->role, ['admin', 'petugas', 'owner']);
    }
}