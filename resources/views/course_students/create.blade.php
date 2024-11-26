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
    <h1 class="my-4">Crear Inscripción</h1>
    <form action="{{ route('course_students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_id">Estudiante</label>
            <select class="form-control" id="student_id" name="student_id" required>
                @foreach ($students as $student)
                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="course_id">Curso</label>
            <select class="form-control" id="course_id" name="course_id" required>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="commission_id">Comisión</label>
            <select class="form-control" id="commission_id" name="commission_id" required>
                @foreach ($commissions as $commission)
                    <option value="{{ $commission->id }}">{{ $commission->schedule }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Inscribir</button>
    </form>
</div>
</body>
</html>