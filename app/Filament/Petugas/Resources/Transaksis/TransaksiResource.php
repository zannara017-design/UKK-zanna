<?php

namespace App\Filament\Petugas\Resources\Transaksis;

use App\Filament\Petugas\Resources\Transaksis\Pages\CreateTransaksi;
use App\Filament\Petugas\Resources\Transaksis\Pages\EditTransaksi;
use App\Filament\Petugas\Resources\Transaksis\Pages\ListTransaksis;
use App\Filament\Petugas\Resources\Transaksis\Pages\ViewTransaksi;
use App\Filament\Petugas\Resources\Transaksis\Schemas\TransaksiForm;
use App\Filament\Petugas\Resources\Transaksis\Schemas\TransaksiInfolist;
use App\Filament\Petugas\Resources\Transaksis\Tables\TransaksisTable;
use App\Models\Transaksi;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Transaksi';

    public static function getEloquentQuery(): Builder
{
    return parent::getEloquentQuery()
        ->where('id_user', Auth::id());
}

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
            'create' => CreateTransaksi::route('/create'),
            'view' => ViewTransaksi::route('/{record}'),
            'edit' => EditTransaksi::route('/{record}/edit'),
        ];
    }
}