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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->foreignId('shift_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('jabatan_id')->constrained()->onUpdate('cascade')->onDelete('restrict');
            $table->text('alamat');
            $table->string('qr_code')->nullable();  // Tambahkan kolom untuk QR Code
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
