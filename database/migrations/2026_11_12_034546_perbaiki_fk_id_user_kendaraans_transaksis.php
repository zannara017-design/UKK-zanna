<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Lepas foreign key lama (yang mengarah ke "user")
        foreach (['transaksis', 'kendaraans', 'log_aktivitas'] as $tabel) {
            Schema::table($tabel, function (Blueprint $table) {
                $table->dropForeign(['id_user']);
            });
        }

        // 2. Pindahkan baris yang pemiliknya sudah tidak ada ke admin (id 1)
        // Ceknya ke tabel "users" (yang bener), bukan "user"
        foreach (['transaksis', 'kendaraans', 'log_aktivitas'] as $tabel) {
            DB::table($tabel)
                ->whereNotIn('id_user', DB::table('users')->pluck('id'))
                ->update(['id_user' => 1]);
        }

        // 3. Pasang foreign key baru ke tabel "users"
        foreach (['transaksis', 'kendaraans', 'log_aktivitas'] as $tabel) {
            Schema::table($tabel, function (Blueprint $table) {
                $table->foreign('id_user')->references('id')->on('users');
            });
        }
    }

    public function down(): void
    {
        foreach (['transaksis', 'kendaraans', 'log_aktivitas'] as $tabel) {
            Schema::table($tabel, function (Blueprint $table) {
                $table->dropForeign(['id_user']);
                $table->foreign('id_user')->references('id')->on('users');
            });
        }
    }
};