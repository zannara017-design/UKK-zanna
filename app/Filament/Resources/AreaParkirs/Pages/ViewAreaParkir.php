<?php

namespace App\Filament\Resources\AreaParkirs\Pages;

use App\Filament\Resources\AreaParkirs\AreaParkirResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewAreaParkir extends ViewRecord
{
    protected static string $resource = AreaParkirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
