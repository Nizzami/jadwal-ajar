<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beban Mengajar</title>

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

        .button-success {
            background: #16a34a;
            color: white;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .filter {
            display: flex;
            gap: 12px;
            align-items: end;
        }

        .form-group {
            flex: 1;
            max-width: 450px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: white;
            font-size: 14px;
        }

        .alert {
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 6px;
            background: #dcfce7;
            color: #166534;
        }

        .alert-danger {
            background: #fee2e2;
            color: #991b1b;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 20px;
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

        .empty {
            text-align: center;
            padding: 30px;
            color: #6b7280;
        }

        .text-center {
            text-align: center;
        }

        .text-muted {
            color: #6b7280;
            font-size: 13px;
        }

        form {
            display: inline;
        }

        @media (max-width: 768px) {
            body {
                padding: 20px;
            }

            .header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .filter {
                flex-direction: column;
                align-items: stretch;
            }

            .form-group {
                max-width: none;
            }

            .card {
                overflow-x: auto;
            }

            table {
                min-width: 850px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="header">
        <div>
            <h1>Beban Mengajar</h1>
            <p>Kelola pembagian guru, mata pelajaran, kelas, dan jumlah JP.</p>
        </div>

        <a href="{{ route('teaching-assignments.create') }}"
           class="button button-primary">
            + Tambah Beban Mengajar
        </a>
    </div>

    @if (session('success'))
        <div class="alert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">

        <form method="GET"
              action="{{ route('teaching-assignments.index') }}">

            <div class="filter">

                <div class="form-group">
                    <label for="academic_year_id">
                        Tahun Pelajaran / Semester
                    </label>

                    <select
                        name="academic_year_id"
                        id="academic_year_id"
                        onchange="this.form.submit()"
                    >
                        @foreach ($academicYears as $academicYear)
                            <option
                                value="{{ $academicYear->id }}"
                                {{ $selectedAcademicYear == $academicYear->id ? 'selected' : '' }}
                            >
                                {{ $academicYear->tahun_pelajaran }}
                                - Semester {{ $academicYear->semester }}

                                @if ($academicYear->status)
                                    (Aktif)
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

        </form>

    </div>

    <div class="card">

        @if ($assignments->count())

            <table>

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Guru</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>JP/Minggu</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($assignments as $assignment)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                <strong>
                                    {{ $assignment->teacher->nama }}
                                </strong>

                                <br>

                                <span class="text-muted">
                                    Kode: {{ $assignment->teacher->kode_guru }}
                                </span>
                            </td>

                            <td>
                                <strong>
                                    {{ $assignment->subject->nama }}
                                </strong>

                                <br>

                                <span class="text-muted">
                                    {{ $assignment->subject->kode }}
                                </span>
                            </td>

                            <td>
                                <strong>
                                    {{ $assignment->kelas->nama_kelas }}
                                </strong>

                                @if ($assignment->kelas->jurusan)
                                    <br>

                                    <span class="text-muted">
                                        {{ $assignment->kelas->jurusan }}
                                    </span>
                                @endif
                            </td>

                            <td class="text-center">
                                <strong>
                                    {{ $assignment->jumlah_jp }}
                                </strong>
                                JP
                            </td>

                            <td>

                                <div class="actions">

                                    <a
                                        href="{{ route('teaching-assignments.show', $assignment) }}"
                                        class="button button-secondary"
                                    >
                                        Lihat
                                    </a>

                                    <a
                                        href="{{ route('teaching-assignments.edit', $assignment) }}"
                                        class="button button-primary"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('teaching-assignments.destroy', $assignment) }}"
                                        method="POST"
                                        onsubmit="return confirm('Yakin ingin menghapus beban mengajar ini?')"
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
                Belum ada data beban mengajar untuk tahun pelajaran yang dipilih.
            </div>

        @endif

    </div>

</div>

</body>
</html>