<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::query();

        if ($request->has('subject_id') && $request->subject_id != '') {
            $query->where('subject_id', $request->subject_id);
        }

        $courses = $query->get();
        $subjects = Subject::all();

        return view('courses.index', compact('courses', 'subjects'));
    }

    public function exportToPdf(Request $request)
{
    // Filtrar cursos si se selecciona una materia
    $query = Course::query();
    if ($request->has('subject_id') && $request->subject_id != '') {
        $query->where('subject_id', $request->subject_id);
    }

    // Agrupar cursos por materia
    $courses = $query->with('subject')->get()->groupBy('subject.name');

    // Generar el PDF
    $pdf = Pdf::loadView('courses.pdf', compact('courses'));
    return $pdf->download('reporte_cursos_por_materia.pdf');
}

    public function create()
    {
        $subjects = Subject::all();
        return view('courses.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        Course::create($request->only('name', 'subject_id'));
        return redirect()->route('courses.index');
    }

    public function edit(Course $course)
    {
        $subjects = Subject::all();
        return view('courses.edit', compact('course', 'subjects'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $course->update($request->only('name', 'subject_id'));
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index');
    }
}
