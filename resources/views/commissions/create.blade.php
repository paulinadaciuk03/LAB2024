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
    <h1 class="my-4">Crear Comisión</h1>

    <!-- Formulario de creación de comisión -->
    <form action="{{ route('commissions.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="course_id">Curso</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">Seleccionar Curso</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            @error('course_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="classroom">Aula</label>
            <input type="text" name="classroom" id="classroom" class="form-control" required>
            @error('classroom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="schedule">Horario</label>
            <input type="text" name="schedule" id="schedule" class="form-control" required>
            @error('schedule')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success mt-3">Crear Comisión</button>
        <a href="{{ url('/commissions') }}" class="btn btn-secondary mt-3">Volver</a>

    </form>
</div>
</body>
</html>