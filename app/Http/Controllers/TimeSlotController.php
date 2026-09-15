<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\TimeSlot;
use Illuminate\Http\Request;

class TimeSlotController extends Controller
{
    public function index()
    {
        $timeSlots = TimeSlot::with('day')
            ->orderBy('day_id')
            ->orderBy('nomor')
            ->get();

        return view('time-slots.index', compact('timeSlots'));
    }

    public function create()
    {
        $days = Day::where('status', true)
            ->orderBy('urutan')
            ->get();

        return view('time-slots.create', compact('days'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'day_id' => ['required', 'exists:days,id'],
            'nomor' => ['required', 'integer', 'min:1'],
            'nama' => ['required', 'string', 'max:100'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
            'jenis' => ['required', 'string', 'max:50'],
        ]);

        $validated['status'] = $request->boolean('status');

        TimeSlot::create($validated);

        return redirect()
            ->route('time-slots.index')
            ->with('success', 'Jam pelajaran berhasil ditambahkan.');
    }

    public function show(TimeSlot $timeSlot)
    {
        $timeSlot->load('day');

        return view('time-slots.show', compact('timeSlot'));
    }

    public function edit(TimeSlot $timeSlot)
    {
        $days = Day::where('status', true)
            ->orderBy('urutan')
            ->get();

        return view('time-slots.edit', compact('timeSlot', 'days'));
    }

    public function update(Request $request, TimeSlot $timeSlot)
    {
        $validated = $request->validate([
            'day_id' => ['required', 'exists:days,id'],
            'nomor' => ['required', 'integer', 'min:1'],
            'nama' => ['required', 'string', 'max:100'],
            'jam_mulai' => ['required', 'date_format:H:i'],
            'jam_selesai' => ['required', 'date_format:H:i', 'after:jam_mulai'],
            'jenis' => ['required', 'string', 'max:50'],
        ]);

        $validated['status'] = $request->boolean('status');

        $timeSlot->update($validated);

        return redirect()
            ->route('time-slots.index')
            ->with('success', 'Jam pelajaran berhasil diperbarui.');
    }

    public function destroy(TimeSlot $timeSlot)
    {
        $timeSlot->delete();

        return redirect()
            ->route('time-slots.index')
            ->with('success', 'Jam pelajaran berhasil dihapus.');
    }
}