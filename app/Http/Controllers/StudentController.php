<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        $students = Student::get();
        return view('students.index', compact('students'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        //return view('students.create');
        $courses = Course::all(); // Obtén la lista de cursos

        return view('students.create', compact('courses'));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'selected_courses' => 'array',
        ]);

        $student = Student::create($request->all());

        // Relacionar el estudiante con los cursos seleccionados
        if ($request->has('selected_courses')) {
            $student->courses()->attach($request->input('selected_courses'));
        }

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $student = Student::find($id);
        $courses = Course::all(); // Obtén la lista de cursos

        return view('students.edit', compact('student', 'courses'));
    }


    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'selected_courses' => 'array',
        ]);

        $student->update($request->all());

        // Sincronizar los cursos relacionados con los cursos seleccionados
        $student->courses()->sync($request->input('selected_courses'));

        return redirect()->route('students.index')->with('success', 'Student updated successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | SHOW
    |--------------------------------------------------------------------------
    */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully');
    }
}
