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
        Schema::create('area__parkirs', function (Blueprint $table) {
            $table->id('id_area');
            $table->string('nama_area');
            $table->unsignedInteger('kapasitas');
            $table->unsignedInteger('terisi')->default(0);;
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area__parkirs');
    }
};
