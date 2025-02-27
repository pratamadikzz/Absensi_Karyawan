<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Shift;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {

    // Cek apakah data karyawan berhasil diambil
    $karyawans = Karyawan::with(['jabatan', 'shift'])->get();

    // if ($karyawans->isEmpty()) {
    //     // Menangani kasus jika tidak ada karyawan
    //     dd('Tidak ada data karyawan!');
    // }

    return view('dashboard', compact('karyawans'));




        // Menghitung total untuk karyawan, jabatan, dan shift
        $totalKaryawan = Karyawan::count();
        $totalJabatan = Jabatan::count();
        $totalShift = Shift::count();
        // Jika kamu perlu menghitung total absensi, aktifkan kode berikut
        // $totalAbsensi = Absensi::count();

        // Kirim data ke view
        return view('dashboard', compact('totalKaryawan', 'totalJabatan', 'totalShift', 'totalAbsensi'));
    }



}
