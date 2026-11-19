<?php

namespace App\Filament\Resources\TarifParkirs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Illuminate\Validation\Rule;

class TarifParkirForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('jenis_kendaraan')
                ->options(['motor'=> 'Motor', 'mobil' => 'Mobil', 'lainnya' => 'Lainnya'])
                ->rules(fn (?Model $record) => [
                    Rule::unique('tarif__parkirs', 'jenis_kendaraan')
                        ->ignore($record?->id_tarif, 'id_tarif'),
                ])
                ->required(),
                TextInput::make('tarif_per_jam')
                ->label('Tarif per Jam')
                ->numeric()
                ->prefix('Rp')
                ->suffix('/ jam')
                ->minValue(0)
                ->required(),
            ]);
    }
}
