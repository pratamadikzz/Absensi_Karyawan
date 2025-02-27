<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>QR Code Scanner</title>
    <script src="https://cdn.jsdelivr.net/npm/html5-qrcode/minified/html5-qrcode.min.js"></script>
    <style>
        #qr-reader {
            width: 500px;
            margin: auto;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">QR Code Scanner</h1>
    <div id="qr-reader"></div>
    <div id="qr-result" style="text-align: center; margin-top: 20px;"></div>

    <script>
        const qrReader = new Html5Qrcode("qr-reader");

        function onScanSuccess(decodedText, decodedResult) {
            // Menampilkan hasil QR Code yang dipindai
            document.getElementById("qr-result").innerText = `Hasil: ${decodedText}`;

            // Parsing data JSON dari QR Code
            let data;
            try {
                data = JSON.parse(decodedText); // Parse JSON data
            } catch (error) {
                alert("QR Code tidak valid atau format data tidak benar.");
                return;
            }

            // Kirim data ke server
            fetch("{{ route('absensi.storeScannedData') }}", {  // Pastikan URLnya benar sesuai route
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ data })  // Pastikan data yang dikirim sesuai
            })
            .then(response => response.json())
            .then(responseData => {
                console.log("Absensi berhasil disimpan:", responseData);
                alert("Absensi berhasil disimpan!");
            })
            .catch(error => {
                console.error("Terjadi kesalahan dalam mengirim data:", error);
                alert("Terjadi kesalahan. Coba lagi.");
            });

            // Stop scanner setelah berhasil membaca QR Code
            qrReader.stop().then(() => {
                console.log("Scanner stopped.");
                // Bisa juga menambahkan redirect atau feedback ke user
                window.location.href = "/";  // Redirect ke halaman utama setelah berhasil
            }).catch(err => {
                console.error("Error saat menghentikan scanner:", err);
            });
        }

        function onScanFailure(error) {
            // Log error jika scanner gagal membaca QR
            console.warn(`Scan gagal: ${error}`);
        }

        // Inisialisasi scanner
        qrReader.start(
            { facingMode: "environment" }, // Kamera belakang
            { fps: 10, qrbox: 250 },      // Konfigurasi scanner
            onScanSuccess,
            onScanFailure
        ).catch(err => console.error("Gagal memulai scanner:", err));
    </script>
</body>
</html>
