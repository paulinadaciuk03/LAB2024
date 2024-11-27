<?php

namespace App\Http\Controllers;

use App\Models\CourseStudent;
use App\Models\Student;
use App\Models\Course;
use App\Models\Commission;
use Illuminate\Http\Request;

class CourseStudentController extends Controller
{
    public function index()
    {
        $courseStudents = CourseStudent::with('student', 'course', 'commission')->get();
        return view('course_students.index', compact('courseStudents'));
    }

    public function create()
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();
        return view('course_students.create', compact('students', 'courses', 'commissions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        $existingEnrollment = CourseStudent::where('student_id', $validated['student_id'])
                                           ->where('course_id', $validated['course_id'])
                                           ->where('commission_id', $validated['commission_id'])
                                           ->first();

        if ($existingEnrollment) {
            return redirect()->back()->withErrors(['student_id' => 'Este estudiante ya está inscrito en esta comisión.']);
        }

        CourseStudent::create($validated);
        return redirect()->route('course_students.index');
    }

    public function edit(CourseStudent $courseStudent)
    {
        $students = Student::all();
        $courses = Course::all();
        $commissions = Commission::all();
        return view('course_students.edit', compact('courseStudent', 'students', 'courses', 'commissions'));
    }

    public function update(Request $request, CourseStudent $courseStudent)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'commission_id' => 'required|exists:commissions,id',
        ]);

        $existingEnrollment = CourseStudent::where('student_id', $validated['student_id'])
                                           ->where('course_id', $validated['course_id'])
                                           ->where('commission_id', $validated['commission_id'])
                                           ->where('id', '<>', $courseStudent->id)
                                           ->first();

        if ($existingEnrollment) {
            return redirect()->back()->withErrors(['student_id' => 'Este estudiante ya está inscrito en esta comisión.']);
        }

        $courseStudent->update($validated);
        return redirect()->route('course_students.index');
    }

    public function destroy(CourseStudent $courseStudent)
    {
        $courseStudent->delete();
        return redirect()->route('course_students.index');
    }
}
