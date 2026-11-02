<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanan', function (Blueprint $table) {
            $table->increments('layanan_id');
            $table->unsignedInteger('kategori_id')->nullable();
            $table->string('nama', 150);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga_mulai', 12, 2)->default(0);
            $table->unsignedSmallInteger('estimasi_hari')->default(7);
            $table->timestamps();

            $table->foreign('kategori_id')
                  ->references('kategori_id')->on('kategori_layanan')
                  ->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanan');
    }
};
