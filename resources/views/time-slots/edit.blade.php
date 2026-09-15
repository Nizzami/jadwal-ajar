<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jam Pelajaran</title>

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
            max-width: 650px;
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

        input[type="number"],
        input[type="text"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            background: white;
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

        <h1>Edit Jam Pelajaran</h1>

        <p class="description">
            Perbarui hari, waktu, dan jenis slot pelajaran.
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

        <form
            action="{{ route('time-slots.update', $timeSlot) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="day_id">Hari</label>

                <select
                    id="day_id"
                    name="day_id"
                    required
                >
                    <option value="">-- Pilih Hari --</option>

                    @foreach ($days as $day)
                        <option
                            value="{{ $day->id }}"
                            {{ old('day_id', $timeSlot->day_id) == $day->id ? 'selected' : '' }}
                        >
                            {{ $day->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nomor">Nomor</label>

                <input
                    type="number"
                    id="nomor"
                    name="nomor"
                    value="{{ old('nomor', $timeSlot->nomor) }}"
                    min="1"
                    required
                >
            </div>

            <div class="form-group">
                <label for="nama">Nama Jam</label>

                <input
                    type="text"
                    id="nama"
                    name="nama"
                    value="{{ old('nama', $timeSlot->nama) }}"
                    maxlength="100"
                    required
                >
            </div>

            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>

                <input
                    type="time"
                    id="jam_mulai"
                    name="jam_mulai"
                    value="{{ old('jam_mulai', substr($timeSlot->jam_mulai, 0, 5)) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="jam_selesai">Jam Selesai</label>

                <input
                    type="time"
                    id="jam_selesai"
                    name="jam_selesai"
                    value="{{ old('jam_selesai', substr($timeSlot->jam_selesai, 0, 5)) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label for="jenis">Jenis</label>

                <select
                    id="jenis"
                    name="jenis"
                    required
                >
                    <option value="">-- Pilih Jenis --</option>

                    <option
                        value="pelajaran"
                        {{ old('jenis', $timeSlot->jenis) === 'pelajaran' ? 'selected' : '' }}
                    >
                        Pelajaran
                    </option>

                    <option
                        value="tahfizh"
                        {{ old('jenis', $timeSlot->jenis) === 'tahfizh' ? 'selected' : '' }}
                    >
                        Tahfizh
                    </option>

                    <option
                        value="upacara"
                        {{ old('jenis', $timeSlot->jenis) === 'upacara' ? 'selected' : '' }}
                    >
                        Upacara
                    </option>

                    <option
                        value="istirahat"
                        {{ old('jenis', $timeSlot->jenis) === 'istirahat' ? 'selected' : '' }}
                    >
                        Istirahat
                    </option>

                    <option
                        value="isoma"
                        {{ old('jenis', $timeSlot->jenis) === 'isoma' ? 'selected' : '' }}
                    >
                        Isoma
                    </option>

                    <option
                        value="pramuka"
                        {{ old('jenis', $timeSlot->jenis) === 'pramuka' ? 'selected' : '' }}
                    >
                        Pramuka
                    </option>

                    <option
                        value="lainnya"
                        {{ old('jenis', $timeSlot->jenis) === 'lainnya' ? 'selected' : '' }}
                    >
                        Lainnya
                    </option>
                </select>
            </div>

            <div class="form-group">

                <label class="checkbox">

                    <input
                        type="checkbox"
                        name="status"
                        value="1"
                        {{ old('status', $timeSlot->status) ? 'checked' : '' }}
                    >

                    Aktif

                </label>

            </div>

            <div class="actions">

                <button
                    type="submit"
                    class="button button-primary"
                >
                    Simpan Perubahan
                </button>

                <a
                    href="{{ route('time-slots.index') }}"
                    class="button button-secondary"
                >
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>
