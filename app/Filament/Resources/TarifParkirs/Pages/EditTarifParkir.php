<?php

namespace App\Filament\Resources\TarifParkirs\Pages;

use App\Filament\Resources\TarifParkirs\TarifParkirResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTarifParkir extends EditRecord
{
    protected static string $resource = TarifParkirResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
