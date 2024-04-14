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
        Schema::create('post_lowongan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lowongan_id');
            $table->string('judul', 255);
            $table->date('batas_waktu');
            $table->text('deskripsi');
            $table->text('gambar');
            $table->enum('status', ['closed', 'open'])->default('closed');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_lowongan');
    }
};
