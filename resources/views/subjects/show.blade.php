<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mata Pelajaran</title>

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

        .priority {
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

        <h1>Detail Mata Pelajaran</h1>

        <p class="description">
            Informasi mata pelajaran dan parameter penjadwalannya.
        </p>

        <div class="detail">
            <div class="label">
                Kode Mata Pelajaran
            </div>

            <div class="value">
                {{ $subject->kode }}
            </div>
        </div>

        <div class="detail">
            <div class="label">
                Nama Mata Pelajaran
            </div>

            <div class="value">
                {{ $subject->nama }}
            </div>
        </div>

        <div class="detail">
            <div class="label">
                Jumlah JP per Minggu
            </div>

            <div class="value">
                {{ $subject->jumlah_jp_per_minggu }} JP
            </div>
        </div>

        <div class="detail">
            <div class="label">
                Jenis
            </div>

            <div class="value">
                {{ $subject->jenis }}
            </div>
        </div>

        <div class="detail">
            <div class="label">
                Prioritas Penjadwalan
            </div>

            <div class="value">
                <span class="priority">
                    {{ $subject->prioritas }}
                </span>
            </div>
        </div>

        <div class="detail">
            <div class="label">
                Status
            </div>

            <div class="value">

                @if ($subject->status)

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
                href="{{ route('subjects.edit', $subject) }}"
                class="button button-primary"
            >
                Edit Mata Pelajaran
            </a>

            <a
                href="{{ route('subjects.index') }}"
                class="button button-secondary"
            >
                Kembali
            </a>

        </div>

    </div>

</div>

</body>
</html>
