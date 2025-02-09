<?php

namespace App\Http\Controllers;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $courses = Course::all();
        return view('students.index', compact('students', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = 2; // Rol de estudiante
        $user->save();
    
        $student = new Student();
        $student->user_id = $user->id;
        $student->save();
    
        return redirect()->route('login');
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

    public function inscript(Request $request)
    {
        $user = auth()->user();
        $student = Student::where('user_id', $user->id)->first();
        if (!$student) {
            return redirect()->back()->with('error', 'No se pudo inscribir la materia.');
        }
    
        $student->course_id = $request->course_id;
        $student->save(); 
    
        return redirect()->route('students.index')->with('success', 'Materia inscrita correctamente.');
    }
}
