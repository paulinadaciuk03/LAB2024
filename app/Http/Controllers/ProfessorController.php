<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;

class ProfessorController extends Controller
{
    // Mostrar todos los profesores
    public function index()
    {
        $professors = Professor::all(); // Obtener todos los profesores
        return view('professors.index', compact('professors'));
    }

    // Mostrar el formulario para crear un nuevo profesor
    public function create()
    {
        return view('professors.create');
    }

    // Almacenar un nuevo profesor
    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|max:255', // Solo validamos el nombre
        ]);

        // Crear el nuevo profesor
        Professor::create($validated);

        // Redirigir al listado de profesores
        return redirect()->route('professors.index');
    }

    // Mostrar el formulario para editar un profesor existente
    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    // Actualizar los datos de un profesor
    public function update(Request $request, Professor $professor)
    {
        // Validación de los datos
        $validated = $request->validate([
            'name' => 'required|max:255', // Solo validamos el nombre
        ]);

        // Actualizar el profesor
        $professor->update($validated);

        // Redirigir al listado de profesores
        return redirect()->route('professors.index');
    }

    // Eliminar un profesor
    public function destroy(Professor $professor)
    {
        // Eliminar el profesor
        $professor->delete();

        // Redirigir al listado de profesores
        return redirect()->route('professors.index');
    }
}
