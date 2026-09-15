<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>

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
            max-width: 1400px;
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

        .header p {
            margin-bottom: 0;
            color: #6b7280;
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
            overflow-x: auto;
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
            white-space: nowrap;
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
            <h1>Data Guru</h1>
            <p>
                Kelola data guru dan batasan jam mengajar untuk penjadwalan.
            </p>
        </div>

        <a href="{{ route('teachers.create') }}"
           class="button button-primary">
            + Tambah Guru
        </a>
    </div>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        @if ($teachers->count())
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Guru</th>
                        <th>Nama Guru</th>
                        <th>Target JP/Minggu</th>
                        <th>Maks. JP/Hari</th>
                        <th>Maks. JP Berturut</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($teachers as $teacher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>
                                {{ $teacher->kode_guru }}
                            </td>

                            <td>
                                {{ $teacher->nama }}
                            </td>

                            <td>
                                {{ $teacher->target_jp_per_minggu }} JP
                            </td>

                            <td>
                                {{ $teacher->maksimal_jp_per_hari }} JP
                            </td>

                            <td>
                                {{ $teacher->maksimal_jp_berturut_turut }} JP
                            </td>

                            <td>
                                @if ($teacher->status)
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

                                    <a href="{{ route('teachers.show', $teacher) }}"
                                       class="button button-secondary">
                                        Lihat
                                    </a>

                                    <a href="{{ route('teachers.edit', $teacher) }}"
                                       class="button button-primary">
                                        Edit
                                    </a>

                                    <form action="{{ route('teachers.destroy', $teacher) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus data guru ini?')">

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
                Belum ada data guru.
            </div>
        @endif

    </div>

</div>

</body>
</html>
