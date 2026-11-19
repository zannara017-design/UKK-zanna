<?php

namespace App\Filament\Resources\TarifParkirs\Pages;

use App\Filament\Resources\TarifParkirs\TarifParkirResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTarifParkir extends ViewRecord
{
    protected static string $resource = TarifParkirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
