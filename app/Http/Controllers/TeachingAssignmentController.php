<?php

namespace App\Http\Controllers;

use App\Models\AcademicYear;
use App\Models\Kelas;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeachingAssignment;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeachingAssignmentController extends Controller
{
    /**
     * Display a listing of teaching assignments.
     */
    public function index(Request $request)
    {
        $academicYears = AcademicYear::orderByDesc('tahun_pelajaran')
            ->orderByDesc('semester')
            ->get();

        $selectedAcademicYear = $request->input(
            'academic_year_id',
            AcademicYear::where('status', true)->value('id')
        );

        $assignments = TeachingAssignment::with([
            'academicYear',
            'teacher',
            'subject',
            'kelas',
        ])
            ->when($selectedAcademicYear, function ($query) use ($selectedAcademicYear) {
                $query->where('academic_year_id', $selectedAcademicYear);
            })
            ->orderBy('teacher_id')
            ->orderBy('kelas_id')
            ->get();

        return view('teaching-assignments.index', compact(
            'assignments',
            'academicYears',
            'selectedAcademicYear'
        ));
    }

    /**
     * Show the form for creating a new teaching assignment.
     */
    public function create()
    {
        $academicYears = AcademicYear::where('status', true)
            ->orderByDesc('tahun_pelajaran')
            ->orderByDesc('semester')
            ->get();

        $teachers = Teacher::where('status', true)
            ->orderBy('nama')
            ->get();

        $subjects = Subject::where('status', true)
            ->orderBy('nama')
            ->get();

        $kelas = Kelas::where('status', true)
            ->orderBy('tingkat')
            ->orderBy('nama_kelas')
            ->get();

        return view('teaching-assignments.create', compact(
            'academicYears',
            'teachers',
            'subjects',
            'kelas'
        ));
    }

    /**
     * Store a newly created teaching assignment.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'academic_year_id' => [
                'required',
                'exists:academic_years,id',
            ],
            'teacher_id' => [
                'required',
                'exists:teachers,id',
            ],
            'subject_id' => [
                'required',
                'exists:subjects,id',
            ],
            'kelas_id' => [
                'required',
                'exists:kelas,id',
            ],
            'jumlah_jp' => [
                'required',
                'integer',
                'min:1',
                'max:20',
            ],
        ]);

        $duplicate = TeachingAssignment::where('academic_year_id', $validated['academic_year_id'])
            ->where('teacher_id', $validated['teacher_id'])
            ->where('subject_id', $validated['subject_id'])
            ->where('kelas_id', $validated['kelas_id'])
            ->exists();

        if ($duplicate) {
            return back()
                ->withInput()
                ->withErrors([
                    'teacher_id' => 'Beban mengajar dengan guru, mata pelajaran, kelas, dan tahun pelajaran tersebut sudah ada.',
                ]);
        }

        TeachingAssignment::create($validated);

        return redirect()
            ->route('teaching-assignments.index')
            ->with('success', 'Beban mengajar berhasil ditambahkan.');
    }

    /**
     * Display the specified teaching assignment.
     */
    public function show(TeachingAssignment $teachingAssignment)
    {
        $teachingAssignment->load([
            'academicYear',
            'teacher',
            'subject',
            'kelas',
        ]);

        return view('teaching-assignments.show', compact('teachingAssignment'));
    }

    /**
     * Show the form for editing the specified teaching assignment.
     */
    public function edit(TeachingAssignment $teachingAssignment)
    {
        $academicYears = AcademicYear::where('status', true)
            ->orderByDesc('tahun_pelajaran')
            ->orderByDesc('semester')
            ->get();

        $teachers = Teacher::where('status', true)
            ->orderBy('nama')
            ->get();

        $subjects = Subject::where('status', true)
            ->orderBy('nama')
            ->get();

        $kelas = Kelas::where('status', true)
            ->orderBy('tingkat')
            ->orderBy('nama_kelas')
            ->get();

        return view('teaching-assignments.edit', compact(
            'teachingAssignment',
            'academicYears',
            'teachers',
            'subjects',
            'kelas'
        ));
    }

    /**
     * Update the specified teaching assignment.
     */
    public function update(
        Request $request,
        TeachingAssignment $teachingAssignment
    ) {
        $validated = $request->validate([
            'academic_year_id' => [
                'required',
                'exists:academic_years,id',
            ],
            'teacher_id' => [
                'required',
                'exists:teachers,id',
            ],
            'subject_id' => [
                'required',
                'exists:subjects,id',
            ],
            'kelas_id' => [
                'required',
                'exists:kelas,id',
            ],
            'jumlah_jp' => [
                'required',
                'integer',
                'min:1',
                'max:20',
            ],
        ]);

        $duplicate = TeachingAssignment::where('academic_year_id', $validated['academic_year_id'])
            ->where('teacher_id', $validated['teacher_id'])
            ->where('subject_id', $validated['subject_id'])
            ->where('kelas_id', $validated['kelas_id'])
            ->where('id', '!=', $teachingAssignment->id)
            ->exists();

        if ($duplicate) {
            return back()
                ->withInput()
                ->withErrors([
                    'teacher_id' => 'Beban mengajar dengan kombinasi tersebut sudah ada.',
                ]);
        }

        $teachingAssignment->update($validated);

        return redirect()
            ->route('teaching-assignments.index')
            ->with('success', 'Beban mengajar berhasil diperbarui.');
    }

    /**
     * Remove the specified teaching assignment.
     */
    public function destroy(TeachingAssignment $teachingAssignment)
    {
        $teachingAssignment->delete();

        return redirect()
            ->route('teaching-assignments.index')
            ->with('success', 'Beban mengajar berhasil dihapus.');
    }
}