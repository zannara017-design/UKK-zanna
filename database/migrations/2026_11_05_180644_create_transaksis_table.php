<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
    $table->id('id_parkir');
    $table->foreignId('id_kendaraan')->constrained('kendaraans', 'id_kendaraan');
    $table->dateTime('waktu_masuk');
    $table->dateTime('waktu_keluar')->nullable();
    $table->foreignId('id_tarif')->constrained('tarif__parkirs', 'id_tarif');
    $table->unsignedInteger('durasi_jam')->nullable();
    $table->decimal('biaya_total', 10, 0)->nullable();
    $table->enum('status', ['masuk', 'keluar'])->default('masuk');
    $table->foreignId('id_user')->constrained('users');
    $table->foreignId('id_area')->constrained('area__parkirs', 'id_area');
    $table->timestamps();
});
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
