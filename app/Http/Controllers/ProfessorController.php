<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        Professor::create($validated);
        return redirect()->route('professors.index');
    }

    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    public function update(Request $request, Professor $professor)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
        ]);

        $professor->update($validated);
        return redirect()->route('professors.index');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        return redirect()->route('professors.index');
    }
}
