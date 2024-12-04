<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class StudentController extends Controller
{
    public function index(Request $request)
{
    $query = $request->input('name'); 
    $students = Student::when($query, function ($queryBuilder) use ($query) {
        return $queryBuilder->where('name', 'LIKE', "%{$query}%");
    })->get();

    return view('students.index', compact('students'));
}

public function exportToPdf(Request $request)
{
    $query = $request->input('name');
    $students = Student::when($query, function ($queryBuilder) use ($query) {
        return $queryBuilder->where('name', 'LIKE', "%{$query}%");
    })->get();

    $pdf = Pdf::loadView('students.pdf', compact('students'));
    return $pdf->download('students.pdf');
}


    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));    
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:students,email', 
        ]);

        Student::create([ 
        'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('students.index')->with('success', 'Estudiante creado con éxito');
    } 

    public function edit(Student $student)
    {
        return view('students.edit', compact('student')); 
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:students,email,' . $student->id,
        ]);

        $student->update($validated); 

        return redirect()->route('students.index'); 
    }

   
    public function destroy(Student $student)
    {
        $student->delete(); 

        return redirect()->route('students.index');
    }
}
