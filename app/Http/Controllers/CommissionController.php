<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Course;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index(Request $request)
    {
        $query = Commission::query();

        if ($request->has('course_id') && $request->course_id != '') {
            $query->where('course_id', $request->course_id);
        }

        if ($request->has('schedule') && $request->schedule != '') {
            $query->where('schedule', 'like', '%' . $request->schedule . '%');
        }

        $commissions = $query->get();
        $courses = Course::all(); 

        return view('commissions.index', compact('commissions', 'courses'));
    }

    public function create()
    {
        $courses = Course::all(); // Obtener todos los cursos
        return view('commissions.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'classroom' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $commission = Commission::create($request->only('classroom', 'schedule', 'course_id'));
        
        return redirect()->route('commissions.index');
    }

    public function edit(Commission $commission)
    {
        $courses = Course::all(); 
        return view('commissions.edit', compact('commission', 'courses'));
    }

    public function update(Request $request, Commission $commission)
    {
        $request->validate([
            'classroom' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'course_id' => 'required|exists:courses,id',
        ]);

        $commission->update($request->only('classroom', 'schedule', 'course_id'));
        return redirect()->route('commissions.index');
    }

    public function destroy(Commission $commission)
    {
        $commission->delete();
        return redirect()->route('commissions.index');
    }
}
