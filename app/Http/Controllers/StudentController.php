<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Models\Student;
use Illuminate\Http\Request;

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

    public function create()
    {
        return view('students.create'); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255', 
            'email' => 'required|email|unique:students,email', 
        ]);

        Student::create($validated); 
        return redirect()->route('students.index'); 
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
