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
    <h1 class="my-4">Editar Comisión</h1>

    <!-- Formulario de edición de comisión -->
    <form action="{{ route('commissions.update', $commission->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="course_id">Curso</label>
            <select name="course_id" id="course_id" class="form-control" required>
                <option value="">Seleccionar Curso</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" {{ $commission->course_id == $course->id ? 'selected' : '' }}>
                        {{ $course->name }}
                    </option>
                @endforeach
            </select>
            @error('course_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="classroom">Aula</label>
            <input type="text" name="classroom" id="classroom" class="form-control" value="{{ old('classroom', $commission->classroom) }}" required>
            @error('classroom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="schedule">Horario</label>
            <input type="text" name="schedule" id="schedule" class="form-control" value="{{ old('schedule', $commission->schedule) }}" required>
            @error('schedule')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-warning mt-3">Actualizar Comisión</button>
        <a href="{{ url('/commissions') }}" class="btn btn-secondary mt-3">Volver</a>

    </form>
</div>
</body>
</html>