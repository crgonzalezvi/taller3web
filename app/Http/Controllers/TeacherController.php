<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Teacher;

use Illuminate\Support\Facades\Auth;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers=Teacher::all();
        return view('teachers.index', compact('teachers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function students()
    {
        $teacher = Auth::user()->teacher;
        if (!$teacher) {
            abort(403, 'Profesor no encontrado.');
        }

        $course = $teacher->course;
        if (!$course) {
            abort(404, 'Curso no asignado.');
        }
        $students = Student::with('user')
        ->where('course_id', $course->id)
        ->get();
        $students = Student::where('course_id', $course->id)->get();
        return view('teachers.students', compact('students'));
    }

    /**
     * Actualiza la nota de un estudiante.
     */
    public function updateGrade(Request $request, $id)
    {
        $request->validate([
            'grade' => 'required|numeric|min:0|max:10',
        ]);
        // Buscar al estudiante por ID
        $student = Student::findOrFail($id);
        $student->nota = $request->grade;
        $student->save();
        return redirect()->back()->with('success', 'La nota se actualizó correctamente.');
    }
}




