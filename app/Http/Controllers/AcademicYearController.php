<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $academicYears = AcademicYear::orderByDesc('tahun_pelajaran')
            ->orderBy('semester')
            ->get();

        return view('academic-years.index', compact('academicYears'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('academic-years.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tahun_pelajaran' => ['required', 'string', 'size:9'],
            'semester' => ['required', 'integer', 'in:1,2'],
            'status' => ['nullable', 'boolean'],
        ]);

        $validated['status'] = $request->boolean('status');

        AcademicYear::create($validated);

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Tahun pelajaran berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicYear $academicYear): View
    {
        return view('academic-years.show', compact('academicYear'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicYear $academicYear): View
    {
        return view('academic-years.edit', compact('academicYear'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AcademicYear $academicYear): RedirectResponse
    {
        $validated = $request->validate([
            'tahun_pelajaran' => ['required', 'string', 'size:9'],
            'semester' => ['required', 'integer', 'in:1,2'],
            'status' => ['nullable', 'boolean'],
        ]);

        $validated['status'] = $request->boolean('status');

        $academicYear->update($validated);

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Tahun pelajaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicYear $academicYear): RedirectResponse
    {
        $academicYear->delete();

        return redirect()
            ->route('academic-years.index')
            ->with('success', 'Tahun pelajaran berhasil dihapus.');
    }
}