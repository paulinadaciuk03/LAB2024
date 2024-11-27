<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudiante</title>
    <!-- Importar Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Editar Curso</h1>
    <form action="{{ route('courses.update', $course->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre del Curso</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
        </div>

        <div class="form-group">
            <label for="subject_id">Materia</label>
            <select class="form-control" id="subject_id" name="subject_id" required>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ $course->subject_id == $subject->id ? 'selected' : '' }}>
                        {{ $subject->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Actualizar Curso</button>
        <a href="{{ url('/courses') }}" class="btn btn-secondary mt-3">Volver</a>
    </form>
</div>
<!-- Importar Bootstrap JS y dependencias -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

