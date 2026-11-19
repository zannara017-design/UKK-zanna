<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class UsersForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
                TextInput::make('password')->required(),
                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'petugas' => 'Petugas',
                        'owner' => ' Owner',
                    ])
                    ->required(),
                Forms\Components\Toggle::make('status_aktif')
                ->label('Status Aktif')
                ->default(1)
                ->required(),
            ]);
    }
}
