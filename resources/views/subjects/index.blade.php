<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Pelajaran</title>

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
            max-width: 1200px;
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

        .priority {
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
            <h1>Data Mata Pelajaran</h1>

            <p>
                Kelola mata pelajaran dan kebutuhan JP untuk penjadwalan.
            </p>
        </div>

        <a href="{{ route('subjects.create') }}"
           class="button button-primary">
            + Tambah Mata Pelajaran
        </a>
    </div>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">

        @if ($subjects->count())

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Mata Pelajaran</th>
                        <th>JP/Minggu</th>
                        <th>Jenis</th>
                        <th>Prioritas</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($subjects as $subject)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $subject->kode }}
                            </td>

                            <td>
                                {{ $subject->nama }}
                            </td>

                            <td>
                                {{ $subject->jumlah_jp_per_minggu }} JP
                            </td>

                            <td>
                                {{ $subject->jenis }}
                            </td>

                            <td>
                                <span class="priority">
                                    {{ $subject->prioritas }}
                                </span>
                            </td>

                            <td>

                                @if ($subject->status)

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

                                    <a href="{{ route('subjects.show', $subject) }}"
                                       class="button button-secondary">
                                        Lihat
                                    </a>

                                    <a href="{{ route('subjects.edit', $subject) }}"
                                       class="button button-primary">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('subjects.destroy', $subject) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus mata pelajaran ini?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="button button-danger"
                                        >
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
                Belum ada data mata pelajaran.
            </div>

        @endif

    </div>

</div>

</body>
</html>
