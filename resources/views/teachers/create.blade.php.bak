<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Guru</title>

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
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
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

        <h1>Tambah Guru</h1>

        <p class="description">
            Tambahkan data guru beserta batasan jam mengajar untuk kebutuhan penjadwalan.
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

        <form action="{{ route('teachers.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="kode_guru">Kode Guru</label>

                <input
                    type="text"
                    id="kode_guru"
                    name="kode_guru"
                    value="{{ old('kode_guru') }}"
                    maxlength="30"
                    placeholder="Contoh: GR001"
                    required
                >

                <span class="hint">
                    Kode guru harus unik.
                </span>
            </div>

            <div class="form-group">
                <label for="nama">Nama Guru</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama') }}"
                    maxlength="150"
                    placeholder="Contoh: Ahmad Fauzan"
                    required
                >
            </div>

            <div class="form-group">
                <label for="target_jp_per_minggu">
                    Target JP per Minggu
                </label>

                <input
                    type="number"
                    id="target_jp_per_minggu"
                    name="target_jp_per_minggu"
                    value="{{ old('target_jp_per_minggu', 24) }}"
                    min="1"
                    required
                >

                <span class="hint">
                    Jumlah jam pelajaran yang ditargetkan dalam satu minggu.
                </span>
            </div>

            <div class="form-group">
                <label for="maksimal_jp_per_hari">
                    Maksimal JP per Hari
                </label>

                <input
                    type="number"
                    id="maksimal_jp_per_hari"
                    name="maksimal_jp_per_hari"
                    value="{{ old('maksimal_jp_per_hari', 6) }}"
                    min="1"
                    required
                >

                <span class="hint">
                    Batas maksimal jam mengajar guru dalam satu hari.
                </span>
            </div>

            <div class="form-group">
                <label for="maksimal_jp_berturut_turut">
                    Maksimal JP Berturut-turut
                </label>

                <input
                    type="number"
                    id="maksimal_jp_berturut_turut"
                    name="maksimal_jp_berturut_turut"
                    value="{{ old('maksimal_jp_berturut_turut', 3) }}"
                    min="1"
                    required
                >

                <span class="hint">
                    Batas maksimal jam mengajar berturut-turut tanpa jeda.
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

                <button type="submit" class="button button-primary">
                    Simpan
                </button>

                <a href="{{ route('teachers.index') }}"
                   class="button button-secondary">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
