<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ukuran_pelanggan', function (Blueprint $table) {
            $table->increments('ukuran_id');
            $table->unsignedInteger('pelanggan_id');
            $table->decimal('lingkar_dada', 5, 1)->nullable();
            $table->decimal('lingkar_pinggang', 5, 1)->nullable();
            $table->decimal('lingkar_pinggul', 5, 1)->nullable();
            $table->decimal('panjang_baju', 5, 1)->nullable();
            $table->decimal('panjang_lengan', 5, 1)->nullable();
            $table->decimal('lebar_bahu', 5, 1)->nullable();
            $table->decimal('panjang_celana', 5, 1)->nullable();
            $table->string('catatan')->nullable();
            $table->timestamps();

            $table->foreign('pelanggan_id')
                  ->references('pelanggan_id')->on('pelanggan')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ukuran_pelanggan');
    }
};
