<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Buat Karyawan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .form-group label {
            font-weight: bold;
        }
        .form-group input, .form-group select {
            border-radius: 5px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Buat Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <!-- Tampilkan pesan error jika ada -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Form Input Karyawan -->
                        <form action="{{ route('karyawan.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama">Nama Karyawan</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan nama karyawan" value="{{ old('nama') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('email') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="shift_id">Shift</label>
                                <select name="shift_id" class="form-control" required>
                                    <option value="">Pilih Shift</option>
                                    @foreach ($shift as $s)
                                        <option value="{{ $s->id }}" {{ old('shift_id') == $s->id ? 'selected' : '' }}>{{ $s->shift }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jabatan_id">Jabatan</label>
                                <select name="jabatan_id" class="form-control" required>
                                    <option value="">Pilih Jabatan</option>
                                    @foreach ($jabatan as $j)
                                        <option value="{{ $j->id }}" {{ old('jabatan_id') == $j->id ? 'selected' : '' }}>{{ $j->jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Masukkan alamat" value="{{ old('alamat') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('karyawan.index') }}" class="btn btn-secondary ml-2">Kembali</a>
                        </form>

                        <!-- Menampilkan QR Code setelah sukses -->
                        @if(session('success'))
                            <div class="alert alert-success mt-3">
                                <p>{{ session('success') }}</p>
                                <img src="{{ asset('storage/' . $karyawan->qr_code) }}" alt="QR Code" class="img-fluid mt-2">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
