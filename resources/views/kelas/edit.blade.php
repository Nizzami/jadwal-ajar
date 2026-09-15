<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kelas</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 40px;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            color: #1f2937;
        }

        .container {
            max-width: 700px;
            margin: 0 auto;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        h1 {
            margin-top: 0;
        }

        .description {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
        }

        .hint {
            display: block;
            margin-top: 5px;
            font-size: 13px;
            color: #6b7280;
        }

        .checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .checkbox input {
            width: auto;
        }

        .error {
            color: #dc2626;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .error ul {
            margin: 0;
            padding-left: 20px;
        }

        .actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .button {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .button-primary {
            background: #2563eb;
            color: white;
        }

        .button-secondary {
            background: #6b7280;
            color: white;
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Edit Kelas</h1>

        <p class="description">
            Perbarui data kelas yang digunakan dalam penjadwalan.
        </p>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('kelas.update', $kelas) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-group">

                <label for="tingkat">
                    Tingkat
                </label>

                <input
                    type="number"
                    id="tingkat"
                    name="tingkat"
                    value="{{ old('tingkat', $kelas->tingkat) }}"
                    min="1"
                    max="12"
                    required
                >

                <span class="hint">
                    Contoh: 10 untuk kelas X, 11 untuk kelas XI,
                    12 untuk kelas XII.
                </span>

            </div>

            <div class="form-group">

                <label for="nama_kelas">
                    Nama Kelas
                </label>

                <input
                    type="text"
                    id="nama_kelas"
                    name="nama_kelas"
                    value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
                    maxlength="100"
                    required
                >

            </div>

            <div class="form-group">

                <label for="jurusan">
                    Jurusan
                </label>

                <input
                    type="text"
                    id="jurusan"
                    name="jurusan"
                    value="{{ old('jurusan', $kelas->jurusan) }}"
                    maxlength="100"
                >

                <span class="hint">
                    Kosongkan jika kelas tidak memiliki jurusan.
                </span>

            </div>

            <div class="form-group">

                <label for="jumlah_siswa">
                    Jumlah Siswa
                </label>

                <input
                    type="number"
                    id="jumlah_siswa"
                    name="jumlah_siswa"
                    value="{{ old('jumlah_siswa', $kelas->jumlah_siswa) }}"
                    min="0"
                    required
                >

            </div>

            <div class="form-group">

                <label for="wali_kelas">
                    Wali Kelas
                </label>

                <input
                    type="text"
                    id="wali_kelas"
                    name="wali_kelas"
                    value="{{ old('wali_kelas', $kelas->wali_kelas) }}"
                    maxlength="150"
                >

            </div>

            <div class="form-group">

                <label class="checkbox">

                    <input
                        type="checkbox"
                        name="status"
                        value="1"
                        {{ old('status', $kelas->status) ? 'checked' : '' }}
                    >

                    Aktif

                </label>

            </div>

            <div class="actions">

                <button
                    type="submit"
                    class="button button-primary"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('kelas.index') }}"
                    class="button button-secondary"
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
