<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<div class="container">
    <h1 class="my-4">Inscripciones de Estudiantes</h1>
    <a href="{{ route('course_students.create') }}" class="btn btn-success mb-3">Nueva Inscripción</a>
    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Estudiante</th>
                <th>Curso</th>
                <th>Comisión</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($courseStudents as $courseStudent)
            <tr>
                <td>{{ $courseStudent->student->name }}</td>
                <td>{{ $courseStudent->course->name }}</td>
                <td>{{ $courseStudent->commission->schedule }}</td>
                <td>
                    <a href="{{ route('course_students.edit', $courseStudent->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('course_students.destroy', $courseStudent->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta inscripción?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>