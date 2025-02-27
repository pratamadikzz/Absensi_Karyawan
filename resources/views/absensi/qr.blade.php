<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Absensi Online</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="{{ asset('landing/assets/css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('landing/assets/css/cs-skin-elastic.css') }}">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="{{ asset('landing/assets/scss/style.css') }}">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <style>

        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f4f7fc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: 600;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fafafa;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="date"]:focus,
        input[type="time"]:focus,
        select:focus {
            border-color: #4CAF50;
            outline: none;
        }

        button[type="submit"] {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            background-color: #d9f7d9;
            color: #4CAF50;
            border-radius: 5px;
            font-size: 14px;
        }
        .content {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh; /* Menjaga agar content berada di tengah halaman */
        }

    </style>
</head>

<body>
    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                {{-- <img src="{{ asset('landing/images/logo.png') }}" alt="Logo"> --}}
                <a class="navbar-brand" href="{{ route('dashboard') }}">
                    <h3>User|AbsenKU</h3>
                </a>
                <a class="navbar-brand hidden" href="./">
                    <h4 alt="Logo">A</h4>
                </a>
                {{-- <img src="{{ asset('landing/images/logo2.png') }}" alt="Logo"> --}}
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('dashboard') }}"> <i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Absensi</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        {{-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-suitcase"></i>Master Data</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-user"></i><a href="ui-buttons.html">Data Karyawan</a></li>
                            <li><i class="fa fa-users"></i><a href="ui-badges.html">Data Jabatan</a></li>
                            <li><i class="fa fa-wrench"></i><a href="ui-tabs.html">Data Shift</a></li>
                            <li><i class="fa fa-check-square-o"></i><a href="ui-social-buttons.html">Data Absensi</a></li> --}}
                        {{-- <li><i class="fa fa-wrench"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li> --}}
                        {{-- </ul> --}}
                    </li>
                    {{-- menu-item-has-children dropdown --}}
                    {{-- <li class="">
                        <a href="{{ route('ambil') }}" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa ti-dropbox"></i>Ambil Qr Code</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-table"></i><a href="tables-basic.html">Basic Table</a></li>
                            <li><i class="fa fa-table"></i><a href="tables-data.html">Data Table</a></li>
                        </ul>
                    </li> --}}

                    <li class="menu-item-has-children dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-qrcode"></i>Scan Qr
                            Code</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-qrcode"></i><a href="{{ route('scanQrCode') }}">Scan</a></li>
                        </ul>
                    </li>

                    {{-- <h3 class="menu-title">Presensi</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Icons</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Font Awesome</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Themefy Icons</a></li>
                        </ul>
                    </li> --}}
                    {{-- <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                    </li> --}}
                    {{-- <li class="menu-item-has-children active dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a></li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a></li>
                        </ul>
                    </li> --}}
                    <h3 class="menu-title">Help</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa ti-settings"></i>Setting</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                                <i class="menu-icon fa fa-sign-out"></i>
                                 <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                     Logout
                                 </a>
                                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                     @csrf
                                 </form>
                             </li>
                            {{-- <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a>
                            </li> --}}
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..."
                                    aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>
                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


                            </button>

                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="user-avatar rounded-circle"
                                src="{{ asset('landing/images/icon user.png') }}">
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <div class="user-menu dropdown-menu">

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile.edit')">
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>

                            </div>
                        </form>
                    </div>
                    <div id="datetime"></div>

                    <script>
                        function updateDateTime() {
                            const currentTime = new Date();

                            // Format waktu
                            const hours = currentTime.getHours().toString().padStart(2, '0');
                            const minutes = currentTime.getMinutes().toString().padStart(2, '0');
                            const seconds = currentTime.getSeconds().toString().padStart(2, '0');
                            const timeString = `${hours}:${minutes}:${seconds}`;

                            // Format tanggal
                            const year = currentTime.getFullYear();
                            const monthNames = [
                                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                            ];
                            const month = monthNames[currentTime.getMonth()]; // Nama bulan
                            const date = currentTime.getDate().toString().padStart(2, '0');
                            const dayNames = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                            const dayName = dayNames[currentTime.getDay()]; // Nama hari

                            const dateString = `${dayName}, ${date} ${month} ${year}`;

                            // Tampilkan tanggal dan waktu
                            document.getElementById('datetime').textContent = `${dateString} ${timeString}`;
                        }

                        // Update setiap detik
                        setInterval(updateDateTime, 1000);
                        updateDateTime(); // Panggil langsung untuk menghindari delay
                    </script>
                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language"
                            aria-haspopup="true" aria-expanded="true">
                            <i class=""></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-id"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-jp"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->



        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><i class="fa fa-laptop"></i></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="container">
                <h1 class="text-center">QR Code Absensi</h1>
                <div class="alert alert-info">
                    QR Code untuk absensi Anda
                </div>

                <div class="d-flex justify-content-center" style="min-height: 300px;">
                    <!-- Menempatkan QR Code di tengah -->
                    <div>
                        {!! $qrCode !!}
                    </div>
                </div>

                <p class="text-center">Scan QR Code di aplikasi yang mendukung QR Code reader untuk absen.</p>
            </div>

        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function () {
                // Mendapatkan waktu saat ini untuk Jam
                var currentTime = new Date();
                var hours = currentTime.getHours();
                var minutes = currentTime.getMinutes();

                // Format waktu menjadi HH:MM (menggunakan dua digit)
                if (minutes < 10) {
                    minutes = '0' + minutes;
                }

                var formattedTime = hours + ':' + minutes;

                // Setel nilai input jam dengan waktu otomatis
                document.getElementById('jam').value = formattedTime;

                // Menampilkan jam di form untuk referensi pengguna
                document.getElementById('jam_tampil').innerText = 'Jam Absen: ' + formattedTime;

                // Mendapatkan tanggal hari ini untuk Tanggal
                var currentDate = currentTime.toISOString().split('T')[0];

                // Setel nilai input tanggal dengan tanggal hari ini dan buat hanya bisa dibaca
                document.getElementById('tanggal').value = currentDate;
            });
        </script>


    <script src="{{ asset('landing/assets/js/vendor/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('landing/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('landing/assets/js/main.js') }}"></script>
    <!--  Chart js -->
    <script src="{{ asset('landing/assets/js/lib/chart-js/Chart.bundle.js') }}"></script>
    <script src="{{ asset('landing/assets/js/lib/chart-js/chartjs-init.js') }}"></script>

</body>

</html>
