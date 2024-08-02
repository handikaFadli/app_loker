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
        Schema::create('keterampilan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelamar_id')->references('id')->on('pelamar');
            $table->string('nama', 255);
            $table->integer('penguasaan');
            $table->text('sertifikat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keterampilan');
    }
};
