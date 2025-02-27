<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>
        /* Custom Styles */
        .form-control {
            border-radius: 20px;
            border: 1px solid #ddd;
            padding: 1.25rem 1.5rem;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
        }

        .btn-user {
            border-radius: 20px;
            font-size: 1rem;
            padding: 0.75rem 1.25rem;
            width: 100%;
            text-transform: uppercase;
        }

        .btn-primary {
            background-color: #4e73df;
            border: none;
        }

        .btn-google, .btn-facebook {
            border-radius: 20px;
            font-size: 1rem;
            padding: 0.75rem 1.25rem;
            width: 100%;
            text-align: center;
        }

        .btn-google {
            background-color: #db4437;
        }

        .btn-facebook {
            background-color: #3b5998;
        }

        .btn-google:hover, .btn-facebook:hover {
            opacity: 0.8;
        }

        .input-group-text {
            border-radius: 20px;
        }

        .card-body {
            padding: 3rem;
        }

        /* Styling for the background image container */
        .bg-register-image {
            background-image: url('{{ asset('admin/img/Profil.jpg') }}');
            background-size: cover;
            background-position: center center;
            background-attachment: fixed;
            height: 100%;
            min-height: 100vh;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .bg-register-image h2 {
            font-size: 2rem;
            font-weight: bold;
        }

        .bg-register-image p {
            font-size: 1rem;
            font-weight: normal;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .container {
            min-height: 100vh;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- Left Section - Background with Text -->
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <div>
                            <h2>Join Our Community!</h2>
                            <p>Sign up to enjoy exclusive features and stay updated with the latest news.</p>
                        </div>
                    </div>

                    <!-- Right Section - Register Form -->
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Create an Account!</h1>
                            </div>

                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf

                                <!-- Name -->
                                <div class="form-group">
                                    <x-input-label for="name" :value="__('Name')" />
                                    <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <x-input-label for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-text-input id="password" class="form-control" type="password" name="password" required />
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="form-group">
                                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                    <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>

                                <hr>

                                <!-- Social Media Register Options -->
                                {{-- <a href="#" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="#" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> --}}
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('admin/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
