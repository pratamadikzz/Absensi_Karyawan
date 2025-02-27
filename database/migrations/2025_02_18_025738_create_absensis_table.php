<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensisTable extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel absensi.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id();
            $table->string('nama'); // Nama karyawan
            $table->string('email'); // Email karyawan
            $table->string('shift', 50); // Shift yang dipilih (misal 'shift_1', 'shift_2', 'shift_3')
            $table->string('jabatan', 50); // Jabatan karyawan (misal 'staff', 'manager', dll)
            $table->date('tanggal');  // Kolom tanggal absensi
            $table->time('jam');      // Kolom jam absensi
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
            $table->string('keterangan')->nullable(); // Kolom untuk keterangan absensi (Hadir/Izin/Tidak Masuk)
        });
    }

    /**
     * Membalikkan migrasi (drop tabel absensi).
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensis');
    }
}
