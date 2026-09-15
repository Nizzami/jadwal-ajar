<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Tahun Pelajaran</title>

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

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        select {
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
            margin-top: 5px;
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

        <h1>Tambah Tahun Pelajaran</h1>
        <p>Tambahkan tahun pelajaran baru.</p>

        @if ($errors->any())
            <div class="error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('academic-years.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="tahun_pelajaran">
                    Tahun Pelajaran
                </label>

                <input
                    type="text"
                    id="tahun_pelajaran"
                    name="tahun_pelajaran"
                    value="{{ old('tahun_pelajaran') }}"
                    placeholder="Contoh: 2026/2027"
                    maxlength="9"
                    required
                >
            </div>

            <div class="form-group">
                <label for="semester">
                    Semester
                </label>

                <select id="semester" name="semester" required>
                    <option value="">-- Pilih Semester --</option>
                    <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>
                        Semester 1
                    </option>
                    <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>
                        Semester 2
                    </option>
                </select>
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

                <a href="{{ route('academic-years.index') }}"
                   class="button button-secondary">
                    Kembali
                </a>
            </div>

        </form>

    </div>

</div>

</body>
</html>