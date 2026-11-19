<?php

namespace App\Filament\Owner\Resources\Transaksis;

use App\Filament\Owner\Resources\Transaksis\Pages\ListTransaksis;
use App\Filament\Owner\Resources\Transaksis\Schemas\TransaksiForm;
use App\Filament\Owner\Resources\Transaksis\Schemas\TransaksiInfolist;
use App\Filament\Owner\Resources\Transaksis\Tables\TransaksisTable;
use App\Models\Transaksi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Rekap Transaksi';

    protected static ?string $pluralModelLabel = 'Rekap Transaksi';

    public static function getRecordTitle(?Model $record): string|Htmlable|null
    {
        return $record ? 'Transaksi #' . $record->id_parkir : null;
    }

    public static function form(Schema $schema): Schema
    {
        return TransaksiForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TransaksiInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TransaksisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTransaksis::route('/'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function canEdit($record): bool
    {
        return false;
    }

    public static function canDelete($record): bool
    {
        return false;
    }
}