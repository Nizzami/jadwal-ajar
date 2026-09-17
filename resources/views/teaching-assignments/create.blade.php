<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Beban Mengajar</title>

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
            max-width: 800px;
            margin: 0 auto;
        }

        .header {
            margin-bottom: 25px;
        }

        h1 {
            margin: 0 0 8px;
        }

        .header p {
            margin: 0;
            color: #6b7280;
        }

        .card {
            background: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.06);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .required {
            color: #dc2626;
        }

        select,
        input[type="number"] {
            width: 100%;
            padding: 11px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: white;
            font-size: 14px;
        }

        select:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #2563eb;
        }

        .error {
            margin-top: 6px;
            color: #dc2626;
            font-size: 13px;
        }

        .alert {
            padding: 12px 16px;
            margin-bottom: 20px;
            border-radius: 6px;
            background: #fee2e2;
            color: #991b1b;
        }

        .alert ul {
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

        .info {
            margin-top: 6px;
            color: #6b7280;
            font-size: 13px;
        }

        @media (max-width: 768px) {
            body {
                padding: 20px;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Tambah Beban Mengajar</h1>
        <p>
            Tentukan guru, mata pelajaran, kelas, dan jumlah JP yang harus dijadwalkan.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">

        <form
            action="{{ route('teaching-assignments.store') }}"
            method="POST"
        >

            @csrf

            <div class="form-group">

                <label for="academic_year_id">
                    Tahun Pelajaran / Semester
                    <span class="required">*</span>
                </label>

                <select
                    name="academic_year_id"
                    id="academic_year_id"
                    required
                >
                    <option value="">-- Pilih Tahun Pelajaran --</option>

                    @foreach ($academicYears as $academicYear)

                        <option
                            value="{{ $academicYear->id }}"
                            {{ old('academic_year_id') == $academicYear->id ? 'selected' : '' }}
                        >
                            {{ $academicYear->tahun_pelajaran }}
                            - Semester {{ $academicYear->semester }}
                        </option>

                    @endforeach

                </select>

                @error('academic_year_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="teacher_id">
                    Guru
                    <span class="required">*</span>
                </label>

                <select
                    name="teacher_id"
                    id="teacher_id"
                    required
                >
                    <option value="">-- Pilih Guru --</option>

                    @foreach ($teachers as $teacher)

                        <option
                            value="{{ $teacher->id }}"
                            {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}
                        >
                            {{ $teacher->nama }}
                            ({{ $teacher->kode_guru }})
                        </option>

                    @endforeach

                </select>

                @error('teacher_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="subject_id">
                    Mata Pelajaran
                    <span class="required">*</span>
                </label>

                <select
                    name="subject_id"
                    id="subject_id"
                    required
                >
                    <option value="">-- Pilih Mata Pelajaran --</option>

                    @foreach ($subjects as $subject)

                        <option
                            value="{{ $subject->id }}"
                            {{ old('subject_id') == $subject->id ? 'selected' : '' }}
                        >
                            {{ $subject->nama }}
                            ({{ $subject->kode }})
                            - {{ $subject->jumlah_jp_per_minggu }} JP/minggu
                        </option>

                    @endforeach

                </select>

                <div class="info">
                    JP/minggu yang tampil adalah alokasi standar mata pelajaran.
                    Jumlah JP assignment dapat disesuaikan.
                </div>

                @error('subject_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="kelas_id">
                    Kelas
                    <span class="required">*</span>
                </label>

                <select
                    name="kelas_id"
                    id="kelas_id"
                    required
                >
                    <option value="">-- Pilih Kelas --</option>

                    @foreach ($kelas as $item)

                        <option
                            value="{{ $item->id }}"
                            {{ old('kelas_id') == $item->id ? 'selected' : '' }}
                        >
                            {{ $item->nama_kelas }}

                            @if ($item->jurusan)
                                - {{ $item->jurusan }}
                            @endif

                        </option>

                    @endforeach

                </select>

                @error('kelas_id')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="form-group">

                <label for="jumlah_jp">
                    Jumlah JP per Minggu
                    <span class="required">*</span>
                </label>

                <input
                    type="number"
                    name="jumlah_jp"
                    id="jumlah_jp"
                    value="{{ old('jumlah_jp') }}"
                    min="1"
                    max="20"
                    required
                >

                <div class="info">
                    Masukkan jumlah JP yang harus dijadwalkan untuk guru pada kelas ini.
                </div>

                @error('jumlah_jp')
                    <div class="error">{{ $message }}</div>
                @enderror

            </div>


            <div class="actions">

                <button
                    type="submit"
                    class="button button-primary"
                >
                    Simpan Beban Mengajar
                </button>

                <a
                    href="{{ route('teaching-assignments.index') }}"
                    class="button button-secondary"
                >
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>