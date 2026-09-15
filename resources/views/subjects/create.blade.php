<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Pelajaran</title>

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

        .hint {
            display: block;
            margin-top: 5px;
            font-size: 13px;
            color: #6b7280;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            background: white;
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

        <h1>Tambah Mata Pelajaran</h1>

        <p class="description">
            Tambahkan mata pelajaran beserta kebutuhan JP dan prioritasnya
            untuk proses penjadwalan.
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

        <form action="{{ route('subjects.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="kode">Kode Mata Pelajaran</label>

                <input
                    type="text"
                    id="kode"
                    name="kode"
                    value="{{ old('kode') }}"
                    maxlength="30"
                    placeholder="Contoh: MTK"
                    required
                >

                <span class="hint">
                    Kode mata pelajaran harus unik.
                </span>
            </div>

            <div class="form-group">
                <label for="nama">Nama Mata Pelajaran</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    maxlength="150"
                    placeholder="Contoh: Matematika"
                    required
                >
            </div>

            <div class="form-group">
                <label for="jumlah_jp_per_minggu">
                    Jumlah JP per Minggu
                </label>

                <input
                    type="number"
                    id="jumlah_jp_per_minggu"
                    name="jumlah_jp_per_minggu"
                    value="{{ old('jumlah_jp_per_minggu', 4) }}"
                    min="1"
                    required
                >

                <span class="hint">
                    Jumlah jam pelajaran yang harus dijadwalkan
                    dalam satu minggu untuk mata pelajaran ini.
                </span>
            </div>

            <div class="form-group">
                <label for="jenis">Jenis Mata Pelajaran</label>

                <select
                    id="jenis"
                    name="jenis"
                    required
                >
                    <option value="">-- Pilih Jenis --</option>

                    <option
                        value="Umum"
                        {{ old('jenis') === 'Umum' ? 'selected' : '' }}
                    >
                        Umum
                    </option>

                    <option
                        value="Keagamaan"
                        {{ old('jenis') === 'Keagamaan' ? 'selected' : '' }}
                    >
                        Keagamaan
                    </option>

                    <option
                        value="Kejuruan"
                        {{ old('jenis') === 'Kejuruan' ? 'selected' : '' }}
                    >
                        Kejuruan
                    </option>

                    <option
                        value="Muatan Lokal"
                        {{ old('jenis') === 'Muatan Lokal' ? 'selected' : '' }}
                    >
                        Muatan Lokal
                    </option>

                    <option
                        value="Lainnya"
                        {{ old('jenis') === 'Lainnya' ? 'selected' : '' }}
                    >
                        Lainnya
                    </option>
                </select>
            </div>

            <div class="form-group">
                <label for="prioritas">
                    Prioritas Penjadwalan
                </label>

                <input
                    type="number"
                    id="prioritas"
                    name="prioritas"
                    value="{{ old('prioritas', 1) }}"
                    min="1"
                    max="10"
                    required
                >

                <span class="hint">
                    1 = prioritas paling tinggi.
                    10 = prioritas lebih rendah.
                </span>
            </div>

            <div class="form-group">

                <label class="checkbox">

                    <input
                        type="checkbox"
                        name="status"
                        value="1"
                        {{ old('status', true) ? 'checked' : '' }}
                    >

                    Aktif

                </label>

            </div>

            <div class="actions">

                <button
                    type="submit"
                    class="button button-primary"
                >
                    Simpan
                </button>

                <a
                    href="{{ route('subjects.index') }}"
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
