<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DayController extends Controller
{
    public function index(): View
    {
        $days = Day::orderBy('urutan')->get();

        return view('days.index', compact('days'));
    }

    public function create(): View
    {
        return view('days.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:50',
            ],
            'urutan' => [
                'required',
                'integer',
                'min:1',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        Day::create($validated);

        return redirect()
            ->route('days.index')
            ->with('success', 'Hari berhasil ditambahkan.');
    }

    public function show(Day $day): View
    {
        return view('days.show', compact('day'));
    }

    public function edit(Day $day): View
    {
        return view('days.edit', compact('day'));
    }

    public function update(Request $request, Day $day): RedirectResponse
    {
        $validated = $request->validate([
            'nama' => [
                'required',
                'string',
                'max:50',
            ],
            'urutan' => [
                'required',
                'integer',
                'min:1',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        $day->update($validated);

        return redirect()
            ->route('days.index')
            ->with('success', 'Hari berhasil diperbarui.');
    }

    public function destroy(Day $day): RedirectResponse
    {
        $day->delete();

        return redirect()
            ->route('days.index')
            ->with('success', 'Hari berhasil dihapus.');
    }
}
