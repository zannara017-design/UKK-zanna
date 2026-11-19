<?php

namespace App\Filament\Pages\Auth;

use App\Models\User;
use Filament\Auth\Http\Responses\Contracts\LoginResponse;
use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    public function authenticate(): ?LoginResponse
    {
        $data = $this->form->getState();

        $user = User::where('email', $data['email'] ?? null)->first();

        // Pesan "akun tidak aktif" hanya muncul kalau password-nya benar,
        // supaya orang lain tidak bisa menebak akun mana yang nonaktif.
        if ($user && Hash::check($data['password'] ?? '', $user->password) && ! $user->status_aktif) {
            throw ValidationException::withMessages([
                'data.email' => 'Akun Anda tidak aktif. Silakan hubungi admin.',
            ]);
        }

        return parent::authenticate();
    }

    protected function getEmailFormComponent(): Component
    {
        return TextInput::make('email')
            ->label('Username')
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.email' => __('filament-panels::auth/pages/login.messages.failed'),
        ]);
    }
}