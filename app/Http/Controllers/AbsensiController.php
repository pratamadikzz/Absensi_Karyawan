<?php
namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // Menampilkan semua data absensi
    public function index()
    {
        $absensies = Absensi::all();
        return view('absensi.absensi', compact('absensies'));
    }

    // Menampilkan form untuk input absensi
    public function create()
    {
        return view('absensi.form');
    }

    // Menyimpan data absensi ke database
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'shift' => 'required|string',
            'jabatan' => 'required|string',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
            'keterangan' => 'required|string',
        ]);

        // Mendapatkan waktu absen yang dimasukkan
        $tanggal = $validated['tanggal'];
        $jam = Carbon::createFromFormat('H:i', $validated['jam'])->format('H:i');

        // Mendapatkan waktu saat ini
        $currentTime = Carbon::now()->format('H:i');

        // Tentukan status otomatis berdasarkan jam
        if ($currentTime >= '07:00' && $currentTime <= '08:00') {
            // Status masuk
            $status = 'masuk';
        } elseif ($currentTime >= '16:00') {
            // Status pulang
            $status = 'pulang';
        } else {
            // Jika waktu di luar jam yang ditentukan
            $status = 'belum pulang';
        }

        // Simpan data absensi ke dalam database
        Absensi::create([
            'nama' => $validated['nama'],
            'email' => $validated['email'],
            'shift' => $validated['shift'],
            'jabatan' => $validated['jabatan'],
            'tanggal' => $validated['tanggal'],
            'jam' => $validated['jam'],
            'keterangan' => $validated['keterangan'],
            'status' => $status, // Status otomatis berdasarkan waktu
        ]);

        return redirect()->route('absensi.index')->with('success', 'Absensi berhasil diisi');
    }

    // Generate QR Code untuk absensi
    public function generateQrCode(Request $request)
    {
        // Ambil data dari form absensi
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'shift' => $request->input('shift'),
            'jabatan' => $request->input('jabatan'),
            'keterangan' => $request->input('keterangan'),
            'tanggal' => $request->input('tanggal'),
            'jam' => $request->input('jam'),
        ];

        // Generate QR Code dengan data tersebut
        $qrCode = QrCode::size(250)->generate(json_encode($data));

        // Tampilkan QR Code
        return view('absensi.qr', ['qrCode' => $qrCode]);
    }

    // Menampilkan halaman untuk scan QR Code
    public function scanQrCode()
    {
        return view('absensi.scan');
    }

    // Menyimpan data absensi yang dipindai
    public function storeScannedData(Request $request)
    {
        // Validasi data QR Code yang dipindai
        $validated = $request->validate([
            'data' => 'required|array',
        ]);

        // Mendapatkan data dari QR Code yang dipindai
        $absensiData = $validated['data'];

        // Cek jika data sudah ada di database, update statusnya
        $absensi = Absensi::where('email', $absensiData['email'])
                          ->where('tanggal', $absensiData['tanggal'])
                          ->first();

        if ($absensi) {
            // Update status absensi jika sudah lebih dari jam 4 sore
            $currentTime = Carbon::now();
            if ($currentTime->hour >= 16 && $absensi->status != 'pulang') {
                $absensi->status = 'pulang';
                $absensi->jam_pulang = $currentTime->format('H:i'); // Set jam pulang
                $absensi->save(); // Simpan perubahan status
                return response()->json([
                    'success' => true,
                    'message' => 'Absen pulang berhasil!',
                ]);
            }
        } else {
            // Jika data tidak ditemukan, simpan data baru ke database
            Absensi::create([
                'nama' => $absensiData['nama'],
                'email' => $absensiData['email'],
                'shift' => $absensiData['shift'],
                'jabatan' => $absensiData['jabatan'],
                'tanggal' => $absensiData['tanggal'],
                'jam' => $absensiData['jam'],
                'keterangan' => $absensiData['keterangan'],
                'status' => 'belum pulang', // Status default
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data absensi berhasil disimpan!',
        ]);
    }

    // Fungsi untuk mengupdate status berdasarkan waktu scan
    public function updateStatusAfterScan(Absensi $absensi)
    {
        // Mendapatkan waktu saat ini
        $currentTime = now();
        $currentHour = $currentTime->hour;

        // Jika waktu sudah lebih dari jam 4 sore, ubah status menjadi "Pulang"
        if ($currentHour >= 16) {
            $absensi->status = 'Pulang'; // Update status menjadi 'Pulang'
            $absensi->jam_pulang = $currentTime->format('H:i'); // Set jam pulang
            $absensi->save(); // Simpan perubahan di database
        }

        return response()->json([
            'message' => 'Status berhasil diupdate!',
            'status' => $absensi->status,
        ]);
    }

    public function show(Absensi $absensi)
    {
        //
    }

    public function edit(Absensi $absensi)
    {
        //
    }

    public function update(Request $request, Absensi $absensi)
    {
        //
    }

    public function destroy(Absensi $absensi)
    {
        //
    }
}
