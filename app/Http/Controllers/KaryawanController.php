<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Jabatan;
use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode; // Import QrCode library
use Illuminate\Support\Facades\Storage; // Import Storage for saving QR code image

class KaryawanController extends Controller
{
    /**
     * Menampilkan daftar semua karyawan.
     */
    public function index()
    {
        // Ambil semua data karyawan
        $karyawans = Karyawan::all();  // Ambil data karyawan untuk ditampilkan

        // Kirim data ke view 'karyawan.index'
        return view('karyawan.index', compact('karyawans'));
    }

    /**
     * Menampilkan form untuk membuat karyawan baru.
     */
    public function create()
    {
        // Ambil data shift dan jabatan yang akan digunakan di form
        $shift = Shift::all();
        $jabatan = Jabatan::all();

        // Tampilkan halaman form untuk membuat karyawan
        return view('karyawan.create', compact('shift', 'jabatan'));
    }

    public function show(Karyawan $karyawan)
    {
        // Tampilkan halaman detail karyawan
        return view('karyawan.show', compact('karyawan'));
    }

    /**
     * Menyimpan data karyawan baru ke dalam database.
     */
    public function store(Request $request)
{
    // Validasi input
    $validateData = $request->validate([
        'nama' => 'required|max:100',
        'email' => 'required|max:100',
        'shift_id' => 'required',
        'jabatan_id' => 'required',
        'alamat' => 'required|max:100',
    ]);

    // Buat karyawan baru
    $karyawan = Karyawan::create($validateData);

    // URL untuk QR Code yang mengarah ke halaman absensi/form
    $qrCodeData = url('/absensi/form');  // Ganti dengan URL absensi/form

    // Membuat QR Code dengan ukuran 300px
    $qrCodeImage = QrCode::size(300)->generate($qrCodeData);

    // Tentukan path untuk menyimpan QR Code
    $qrCodePath = 'qrcodes/' . $karyawan->id . '.png';

    // Simpan QR Code ke dalam folder public
    Storage::put('public/' . $qrCodePath, $qrCodeImage);

    // Simpan path QR Code ke database
    $karyawan->qr_code = $qrCodePath;
    $karyawan->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil ditambahkan');
}


    /**
     * Menampilkan form untuk mengedit data karyawan.
     */
    public function edit(Karyawan $karyawan)
    {
        // Ambil data shift dan jabatan yang digunakan di form
        $shift = Shift::all();
        $jabatan = Jabatan::all();

        // Tampilkan halaman form untuk mengedit data karyawan
        return view('karyawan.edit', compact('karyawan', 'shift', 'jabatan'));
    }

    /**
     * Update data karyawan yang sudah ada.
     */
    public function update(Request $request, Karyawan $karyawan)
{
    // Validasi input
    $validateData = $request->validate([
        'nama' => 'required|max:100',
        'email' => 'required|max:100',
        'shift_id' => 'required',
        'jabatan_id' => 'required',
        'alamat' => 'required|max:100',
    ]);

    // Update data karyawan
    $karyawan->update($validateData);

    // URL untuk QR Code yang mengarah ke halaman absensi/form
    $qrCodeData = url('/absensi/form');  // Ganti dengan URL absensi/form

    // Membuat QR Code dengan ukuran 300px
    $qrCodeImage = QrCode::size(300)->generate($qrCodeData);

    // Tentukan path untuk menyimpan QR Code
    $qrCodePath = 'qrcodes/' . $karyawan->id . '.png';

    // Simpan QR Code ke dalam folder public
    Storage::put('public/' . $qrCodePath, $qrCodeImage);

    // Update path QR Code di database
    $karyawan->qr_code = $qrCodePath;
    $karyawan->save();

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil diupdate');
}


    /**
     * Menghapus data karyawan.
     */
    public function destroy(Karyawan $karyawan)
    {
        // Cek apakah ada pengguna yang login
        $user = Auth::user();

        if ($user) {
            // Mencatat aktivitas penghapusan ke dalam activity_logs
            ActivityLog::create([
                'action' => 'Hapus Data Karyawan',
                'description' => 'Menghapus data karyawan: ' . $karyawan->nama,
                'user_id' => $user->id, // ID pengguna yang menghapus
            ]);
        } else {
            // Jika tidak ada pengguna yang login, bisa dilemparkan exception atau log error
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu');
        }

        // Hapus data karyawan
        $karyawan->delete();

        // Redirect ke halaman index karyawan dengan pesan sukses
        return redirect()->route('karyawan.index')->with('success', 'Karyawan berhasil dihapus');
    }
}

