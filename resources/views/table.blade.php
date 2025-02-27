<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Map Example</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</head>
<body>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Location Map</h4>
                    </div>
                    <div class="card-body">
                        <div id="basic-map" style="width:100%; height:400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Koordinat lokasi yang ingin ditampilkan
    var lokasi = { lat: -6.2088, lng: 106.8456 }; // Jakarta, Indonesia

    // Inisialisasi peta
    function initMap() {
        // Membuat peta dengan posisi default
        var map = new google.maps.Map(document.getElementById("basic-map"), {
            zoom: 12, // zoom level (semakin tinggi semakin dekat)
            center: lokasi // Koordinat yang ingin ditampilkan
        });

        // Menambahkan marker pada lokasi
        var marker = new google.maps.Marker({
            position: lokasi,
            map: map,
            title: "Lokasi Jakarta" // Titik yang akan ditampilkan
        });
    }

    // Pastikan peta akan di-load setelah halaman dimuat
    google.maps.event.addDomListener(window, "load", initMap);
</script>

</body>
</html>
