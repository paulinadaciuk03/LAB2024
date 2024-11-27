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
    <h1 class="my-4">Gestión Escuela</h1>

    <div class="row">
        <div class="col-md-3">
            <div class="list-group">
                <a href="{{ route('students.index') }}" class="list-group-item list-group-item-action">Estudiantes</a>
                <a href="{{ route('courses.index') }}" class="list-group-item list-group-item-action">Cursos</a>
                <a href="{{ route('commissions.index') }}" class="list-group-item list-group-item-action">Comisiones</a>
                <a href="{{ route('subjects.index') }}" class="list-group-item list-group-item-action">Materias</a>
                <a href="{{ route('professors.index') }}" class="list-group-item list-group-item-action">Profesores</a>
                <a href="{{ route('course_students.index') }}" class="list-group-item list-group-item-action">Inscribir un Alumno</a>

            </div>
        </div>
    </div>
</div>
</body>
</html>