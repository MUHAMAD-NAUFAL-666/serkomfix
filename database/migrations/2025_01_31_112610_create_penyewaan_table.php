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
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id('id_sewa');
            $table->foreignId('id')->constrained('users');
            $table->string('nama');
            $table->string('merek');
            $table->decimal('harga_sewa', 10, 2);
            $table->date('tanggal_sewa');
            $table->enum('status', ['sewa', 'selesai', 'batal']);
            $table->integer('durasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaan');
    }
};