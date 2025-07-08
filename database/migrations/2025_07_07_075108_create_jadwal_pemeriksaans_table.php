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
        Schema::create('jadwal_pemeriksaans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('petugas_id');
            $table->text('keterangan');
            $table->foreign('kelas_id')->references('id')->on('kelas');
            $table->foreign('petugas_id')->references('id')->on('petugas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pemeriksaans');
    }
};
