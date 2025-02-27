<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Karyawan</title>
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
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Karyawan</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Nama Karyawan</label>
                                <input type="text" name="nama" class="form-control" value="{{ $karyawan->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $karyawan->email }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Shift</label>
                                <select name="shift_id" class="form-control" required>
                                    @foreach ($shift as $s)
                                        <option value="{{ $s->id }}" {{ ($s->id == $karyawan->shift_id) ? 'selected':'' }}>{{ $s->shift }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Jabatan</label>
                                <select name="jabatan_id" class="form-control" required>
                                    @foreach ($jabatan as $j)
                                        <option value="{{ $j->id }}" {{ ($j->id == $karyawan->jabatan_id) ? 'selected':'' }}>{{ $j->jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ $karyawan->alamat }}" required>
                            </div>

                            <!-- Menampilkan QR Code untuk karyawan ini -->
                            <div class="form-group">
                                <label for="">QR Code Karyawan</label><br>
                                <!-- Menampilkan QR Code dengan URL yang sesuai untuk karyawan -->
                                {!! QrCode::size(100)->generate(route('karyawan.show', $karyawan->id)) !!}
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
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
