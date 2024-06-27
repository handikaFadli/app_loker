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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->references('id')->on('pelamar');
            $table->string('nama_universitas', 255);
            $table->string('bidang_studi', 255);
            $table->float('ipk');
            $table->string('gelar', 255);
            $table->text('transkip_nilai')->nullable();
            $table->text('ijazah')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendidikan');
    }
};
