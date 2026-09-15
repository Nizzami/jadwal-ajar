<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tahun Pelajaran</title>

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
            max-width: 1000px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0;
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

        .button-danger {
            background: #dc2626;
            color: white;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .alert {
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 6px;
            background: #dcfce7;
            color: #166534;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
            text-align: left;
        }

        th {
            background: #f9fafb;
        }

        .actions {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        .status-active {
            color: #166534;
            font-weight: bold;
        }

        .status-inactive {
            color: #991b1b;
            font-weight: bold;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }

        form {
            display: inline;
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Tahun Pelajaran</h1>
            <p>Kelola tahun pelajaran dan semester.</p>
        </div>

        <a href="{{ route('academic-years.create') }}"
           class="button button-primary">
            + Tambah
        </a>
    </div>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        @if ($academicYears->count())
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tahun Pelajaran</th>
                        <th>Semester</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($academicYears as $academicYear)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $academicYear->tahun_pelajaran }}
                            </td>

                            <td>
                                Semester {{ $academicYear->semester }}
                            </td>

                            <td>
                                @if ($academicYear->status)
                                    <span class="status-active">
                                        Aktif
                                    </span>
                                @else
                                    <span class="status-inactive">
                                        Tidak Aktif
                                    </span>
                                @endif
                            </td>

                            <td>
                                <div class="actions">

                                    <a href="{{ route('academic-years.show', $academicYear) }}"
                                       class="button button-secondary">
                                        Lihat
                                    </a>

                                    <a href="{{ route('academic-years.edit', $academicYear) }}"
                                       class="button button-primary">
                                        Edit
                                    </a>

                                    <form action="{{ route('academic-years.destroy', $academicYear) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus tahun pelajaran ini?')">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="button button-danger">
                                            Hapus
                                        </button>

                                    </form>

                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="empty">
                Belum ada data tahun pelajaran.
            </div>
        @endif

    </div>

</div>

</body>
</html>