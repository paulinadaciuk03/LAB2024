<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use PDF;


class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::all();
        return view('professors.index', compact('professors'));
    }
    public function exportPdf()
    {
    // Obtener profesores con sus comisiones asignadas
    $professors = Professor::with('commissions.course')->get();

    // Generar el PDF usando una vista
    $pdf = PDF::loadView('professors.pdf', compact('professors'));

    // Descargar el PDF
    return $pdf->download('reporte_asistencia_profesores.pdf');
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
