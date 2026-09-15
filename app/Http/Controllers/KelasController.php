<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $kelas = Kelas::orderBy('tingkat')
            ->orderBy('nama_kelas')
            ->get();

        return view('kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'tingkat' => [
                'required',
                'integer',
                'min:1',
                'max:12',
            ],
            'nama_kelas' => [
                'required',
                'string',
                'max:100',
            ],
            'jurusan' => [
                'nullable',
                'string',
                'max:100',
            ],
            'jumlah_siswa' => [
                'required',
                'integer',
                'min:0',
            ],
            'wali_kelas' => [
                'nullable',
                'string',
                'max:150',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        Kelas::create($validated);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kela): View
    {
        return view('kelas.show', [
            'kelas' => $kela,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kela): View
    {
        return view('kelas.edit', [
            'kelas' => $kela,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kela): RedirectResponse
    {
        $validated = $request->validate([
            'tingkat' => [
                'required',
                'integer',
                'min:1',
                'max:12',
            ],
            'nama_kelas' => [
                'required',
                'string',
                'max:100',
            ],
            'jurusan' => [
                'nullable',
                'string',
                'max:100',
            ],
            'jumlah_siswa' => [
                'required',
                'integer',
                'min:0',
            ],
            'wali_kelas' => [
                'nullable',
                'string',
                'max:150',
            ],
            'status' => [
                'nullable',
                'boolean',
            ],
        ]);

        $validated['status'] = $request->boolean('status');

        $kela->update($validated);

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kela): RedirectResponse
    {
        $kela->delete();

        return redirect()
            ->route('kelas.index')
            ->with('success', 'Data kelas berhasil dihapus.');
    }
}
