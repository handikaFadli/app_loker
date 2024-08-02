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
        Schema::create('pelamar', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 255)->nullable();
            $table->string('tempat_lahir', 255)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin', 255)->nullable();
            $table->string('tempat_tinggal', 255)->nullable();
            $table->string('status', 255)->nullable();
            $table->string('nomor_telepon', 255)->nullable();
            $table->string('email', 255)->unique();
            $table->string('instagram', 255)->nullable();
            $table->string('linkedin', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->text('cv')->nullable();
            $table->text('formulir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelamar');
    }
};
