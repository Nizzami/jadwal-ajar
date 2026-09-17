<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $teachers = Teacher::orderBy('nama')->get();

        return view('teachers.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'kode_guru' => [
                'required',
                'string',
                'max:30',
                'unique:teachers,kode_guru',
            ],
            'nama' => [
                'required',
                'string',
                'max:150',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
            'target_jp_per_minggu' => [
                'required',
                'integer',
                'min:1',
            ],
            'maksimal_jp_per_hari' => [
                'required',
                'integer',
                'min:1',
            ],
            'maksimal_jp_berturut_turut' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        Teacher::create($validated);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher): View
    {
        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher): View
    {
        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Teacher $teacher): RedirectResponse
    {
        $validated = $request->validate([
            'kode_guru' => [
                'required',
                'string',
                'max:30',
                'unique:teachers,kode_guru,' . $teacher->id,
            ],
            'nama' => [
                'required',
                'string',
                'max:150',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
            'target_jp_per_minggu' => [
                'required',
                'integer',
                'min:1',
            ],
            'maksimal_jp_per_hari' => [
                'required',
                'integer',
                'min:1',
            ],
            'maksimal_jp_berturut_turut' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        $teacher->update($validated);

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher): RedirectResponse
    {
        $teacher->delete();

        return redirect()
            ->route('teachers.index')
            ->with('success', 'Data guru berhasil dihapus.');
    }
}
