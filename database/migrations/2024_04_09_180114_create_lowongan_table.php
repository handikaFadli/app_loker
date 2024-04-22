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
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('perusahaan_id')->references('id')->on('perusahaan');
            $table->string('judul', 255)->unique();
            $table->string('slug', 255)->unique();
            $table->string('kategori', 255);
            $table->string('tipe', 99)->default('full time');
            $table->text('deskripsi');
            $table->date('batas_waktu');
            $table->text('informasi')->nullable();
            $table->char('status', 5)->default('close');
            $table->string('gambar', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongan');
    }
};
