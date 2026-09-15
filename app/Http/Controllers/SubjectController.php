<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $subjects = Subject::orderBy('nama')->get();

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kode' => [
                'required',
                'string',
                'max:30',
                'unique:subjects,kode',
            ],
            'nama' => [
                'required',
                'string',
                'max:150',
            ],
            'jumlah_jp_per_minggu' => [
                'required',
                'integer',
                'min:1',
            ],
            'jenis' => [
                'required',
                'string',
                'max:50',
            ],
            'prioritas' => [
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

        Subject::create($validated);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject): View
    {
        return view('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject): View
    {
        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject): RedirectResponse
    {
        $validated = $request->validate([
            'kode' => [
                'required',
                'string',
                'max:30',
                'unique:subjects,kode,' . $subject->id,
            ],
            'nama' => [
                'required',
                'string',
                'max:150',
            ],
            'jumlah_jp_per_minggu' => [
                'required',
                'integer',
                'min:1',
            ],
            'jenis' => [
                'required',
                'string',
                'max:50',
            ],
            'prioritas' => [
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

        $subject->update($validated);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject): RedirectResponse
    {
        $subject->delete();

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}
