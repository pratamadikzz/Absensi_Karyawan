<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Selamat Datang</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600&family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            background: linear-gradient(45deg, rgba(33, 47, 61, 1), rgba(40, 55, 71, 1));
            font-family: 'Roboto', sans-serif;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            flex-direction: column;
            overflow: hidden;
        }

        /* Background Styling */
        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('IMG/worker2.jpg') center center / cover no-repeat;
            filter: brightness(50%);
            z-index: -1;
            animation: backgroundMove 20s ease-in-out infinite;
        }

        @keyframes backgroundMove {
            0% {
                background-position: 0% 0%;
            }

            50% {
                background-position: 100% 0%;
            }

            100% {
                background-position: 0% 0%;
            }
        }

        /* Logo Section */
        .logo {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
            font-size: 3rem;
            margin-bottom: 30px;
            opacity: 0;
            transform: translateY(-40px);
            animation: logoFadeIn 1s ease-out forwards;
        }

        @keyframes logoFadeIn {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .logo .absen {
            color: #3498db;
        }

        .logo .ku {
            color: #e74c3c;
        }

        /* Text and Content Section */
        .text-container {
            background: rgba(0, 0, 0, 0.7);
            padding: 40px 50px;
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
            max-width: 700px;
            text-align: center;
            transform: scale(0.9);
            opacity: 0;
            animation: textFadeIn 1s ease-out forwards;
        }

        @keyframes textFadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        .text-container h1 {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .text-container p {
            font-size: 1.2rem;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .text-container a {
            color: #1abc9c;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .text-container a:hover {
            color: #3498db;
            transform: scale(1.05);
        }

        /* Button Section */
        .button-container {
            display: flex;
            gap: 20px;
            justify-content: center;
        }

        .button {
            background: linear-gradient(45deg, #3498db, #db3434);
            padding: 12px 30px;
            font-size: 1.2rem;
            font-weight: 500;
            border: none;
            border-radius: 50px;
            color: white;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.3s ease, background 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .button:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 50px rgba(0, 0, 0, 0.3);
            background: linear-gradient(45deg, #1d6fa5, #db3434);
        }

        .button:active {
            transform: scale(1.05);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        /* Footer Section */
        footer {
            width: 100%;
            text-align: center;
            color: #ddd;
            font-size: 0.9rem;
            padding: 15px 0;
            position: absolute;
            bottom: 0;
            animation: fadeInFooter 1.5s ease-out forwards;
        }

        @keyframes fadeInFooter {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Floating Social Media Icons */
        .social-media {
            position: absolute;
            top: 20px; /* Posisikan di atas */
            right: 20px; /* Posisikan di kanan */
            display: flex;
            gap: 25px;
            opacity: 0;
            animation: fadeInFooter 1s ease-out forwards 2s;
        }

        .social-media a {
            color: white;
            font-size: 2.5rem;
            text-decoration: none;
            background: linear-gradient(45deg, #ff6347, #3498db);
            padding: 10px;
            border-radius: 50%;
            transition: transform 0.3s ease, background 0.4s ease, box-shadow 0.4s ease;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .social-media a:hover {
            color: white;
            transform: scale(1.3);
            background: linear-gradient(45deg, #e74c3c, #3498db);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 768px) {
            .text-container h1 {
                font-size: 2.2rem;
            }

            .text-container p {
                font-size: 1rem;
            }

            .button {
                font-size: 1rem;
                padding: 10px 25px;
            }

            .social-media {
                top: 20px; /* Menyesuaikan posisi di atas pada layar kecil */
                right: 20px; /* Menyesuaikan posisi di kanan */
            }
        }
    </style>
</head>

<body>
    <div class="background"></div>
    <div class="container">
        <div class="logo">
            <span class="absen">Absen</span><span class="ku">KU</span>
        </div>
        <div class="text-container">
            <h1>Selamat Datang di Website Absensi Karyawan</h1>
            <p>Sudah mempunyai <a href="{{ route('login') }}">akun</a>? Silakan login atau jika belum, silakan
                <a href="{{ route('register') }}">register</a>.</p>
            <div class="button-container">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="button">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="button">Log In</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="button">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
    <footer>
        &copy; 2025 AbsenKU. All rights reserved.
    </footer>
    {{-- <div class="social-media">
        <a href="">💼</a>
        <a href="">⏰</a>
        <a href="">📝</a>
    </div> --}}

</body>

</html>
