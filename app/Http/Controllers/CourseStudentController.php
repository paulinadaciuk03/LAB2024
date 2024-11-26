<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\Student;
use App\Models\Course;
use App\Models\Commission;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    // Mostrar todas las inscripciones
    public function index()
    {
        $courseStudents = CourseStudent::with('student', 'course', 'commission')->get(); // Obtener todas las inscripciones con las relaciones
        return view('course_students.index', compact('courseStudents'));
    }

    // Mostrar el formulario para crear una nueva inscripción
    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();

        return view('course_students.create', compact('students', 'courses', 'commissions'));
    }

    // Almacenar una nueva inscripción
    public function store(Request $request)
    {
        // Validación
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        // Verificar que el estudiante no esté ya inscrito en la misma comisión del curso
        $existingEnrollment = CourseStudent::where('student_id', $validated['student_id'])
                                           ->where('course_id', $validated['course_id'])
                                           ->where('commission_id', $validated['commission_id'])
                                           ->first();

        if ($existingEnrollment) {
            return redirect()->back()->withErrors(['student_id' => 'Este estudiante ya está inscrito en esta comisión.']);
        }

        // Crear la nueva inscripción
        CourseStudent::create($validated);

        // Redirigir al listado de inscripciones
        return redirect()->route('course_students.index');
    }

    // Mostrar el formulario para editar una inscripción
    public function edit(CourseStudent $courseStudent)
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();

        return view('course_students.edit', compact('courseStudent', 'students', 'courses', 'commissions'));
    }

    // Actualizar una inscripción
    public function update(Request $request, CourseStudent $courseStudent)
    {
        // Validación
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        // Verificar que el estudiante no esté ya inscrito en la misma comisión del curso
        $existingEnrollment = CourseStudent::where('student_id', $validated['student_id'])
                                           ->where('course_id', $validated['course_id'])
                                           ->where('commission_id', $validated['commission_id'])
                                           ->where('id', '<>', $courseStudent->id)
                                           ->first();

        if ($existingEnrollment) {
            return redirect()->back()->withErrors(['student_id' => 'Este estudiante ya está inscrito en esta comisión.']);
        }

        // Actualizar la inscripción
        $courseStudent->update($validated);

        // Redirigir al listado de inscripciones
        return redirect()->route('course_students.index');
    }

    // Eliminar una inscripción
    public function destroy(CourseStudent $courseStudent)
    {
        // Eliminar la inscripción
        $courseStudent->delete();

        // Redirigir al listado de inscripciones
        return redirect()->route('course_students.index');
    }
}
