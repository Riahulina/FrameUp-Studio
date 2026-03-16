<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id('id_pemesanan');
            $table->string('nama_pelanggan');
            $table->string('no_hp');
            $table->string('jurusan');
            $table->unsignedBigInteger('id_frame');
            $table->date('tanggal_pemesanan');
            $table->string('status')->default('menunggu');
            $table->timestamps();

            $table->foreign('id_frame')->references('id_frame')->on('frames');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
