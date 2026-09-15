<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Kelas</title>

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
            margin-bottom: 8px;
        }

        .description {
            color: #6b7280;
            margin-bottom: 25px;
        }

        .detail {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 15px;
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .label {
            font-weight: bold;
            color: #6b7280;
        }

        .value {
            font-weight: 500;
        }

        .status-active {
            color: #166534;
            font-weight: bold;
        }

        .status-inactive {
            color: #991b1b;
            font-weight: bold;
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

        @media (max-width: 600px) {
            body {
                padding: 20px;
            }

            .detail {
                grid-template-columns: 1fr;
                gap: 5px;
            }

            .actions {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="card">

        <h1>Detail Kelas</h1>

        <p class="description">
            Informasi kelas yang digunakan dalam sistem penjadwalan.
        </p>

        <div class="detail">
            <div class="label">
                Tingkat
            </div>

            <div class="value">
                {{ $kelas->tingkat }}
            </div>
        </div>

        <div class="detail">
            <div class="label">
                Nama Kelas
            </div>

            <div class="value">
                {{ $kelas->nama_kelas }}
            </div>
        </div>

        <div class="detail">
            <div class="label">
                Jurusan
            </div>

            <div class="value">
                {{ $kelas->jurusan ?: '-' }}
            </div>
        </div>

        <div class="detail">
            <div class="label">
                Jumlah Siswa
            </div>

            <div class="value">
                {{ $kelas->jumlah_siswa }} siswa
            </div>
        </div>

        <div class="detail">
            <div class="label">
                Wali Kelas
            </div>

            <div class="value">
                {{ $kelas->wali_kelas ?: '-' }}
            </div>
        </div>

        <div class="detail">
            <div class="label">
                Status
            </div>

            <div class="value">

                @if ($kelas->status)

                    <span class="status-active">
                        Aktif
                    </span>

                @else

                    <span class="status-inactive">
                        Tidak Aktif
                    </span>

                @endif

            </div>
        </div>

        <div class="actions">

            <a
                href="{{ route('kelas.edit', $kelas) }}"
                class="button button-primary"
            >
                Edit Kelas
            </a>

            <a
                href="{{ route('kelas.index') }}"
                class="button button-secondary"
            >
                Kembali
            </a>

        </div>

    </div>

</div>

</body>
</html>
