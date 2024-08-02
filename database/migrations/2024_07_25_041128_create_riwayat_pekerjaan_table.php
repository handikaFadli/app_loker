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
        Schema::create('riwayat_pekerjaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->references('id')->on('pelamar');
            $table->string('nama_perusahaan', 255);
            $table->string('jabatan', 255);
            $table->integer('mulai');
            $table->integer('selesai')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('surat_keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pekerjaan');
    }
};
