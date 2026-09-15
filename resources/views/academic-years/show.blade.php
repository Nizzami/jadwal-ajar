<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Tahun Pelajaran</title>

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

        .detail {
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .label {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 5px;
        }

        .value {
            font-size: 18px;
            font-weight: bold;
        }

        .status-active {
            color: #166534;
        }

        .status-inactive {
            color: #991b1b;
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

        <h1>Detail Tahun Pelajaran</h1>

        <div class="detail">
            <div class="label">Tahun Pelajaran</div>
            <div class="value">
                {{ $academicYear->tahun_pelajaran }}
            </div>
        </div>

        <div class="detail">
            <div class="label">Semester</div>
            <div class="value">
                Semester {{ $academicYear->semester }}
            </div>
        </div>

        <div class="detail">
            <div class="label">Status</div>

            @if ($academicYear->status)
                <div class="value status-active">
                    Aktif
                </div>
            @else
                <div class="value status-inactive">
                    Tidak Aktif
                </div>
            @endif
        </div>

        <div class="actions">

            <a href="{{ route('academic-years.edit', $academicYear) }}"
               class="button button-primary">
                Edit
            </a>

            <a href="{{ route('academic-years.index') }}"
               class="button button-secondary">
                Kembali
            </a>

        </div>

    </div>

</div>

</body>
</html>