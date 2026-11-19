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
    Schema::create('kendaraans', function (Blueprint $table) {
    $table->id('id_kendaraan');
    $table->string('plat_nomor')->unique();
    $table->string('jenis_kendaraan');
    $table->string('warna');
    $table->string('pemilik');
    $table->foreignId('id_user')->constrained('users')->cascadeOnDelete()->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
