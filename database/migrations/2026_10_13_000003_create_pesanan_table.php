<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {
            $table->increments('pesanan_id');
            $table->unsignedInteger('pelanggan_id');
            $table->string('jenis_pakaian', 100);
            $table->unsignedSmallInteger('jumlah')->default(1);
            $table->decimal('harga', 12, 2)->default(0);
            $table->date('tanggal_pesan');
            $table->date('tanggal_selesai')->nullable();
            $table->enum('status', ['Baru', 'Diproses', 'Selesai', 'Diambil'])->default('Baru');
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('pelanggan_id')
                  ->references('pelanggan_id')->on('pelanggan')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
