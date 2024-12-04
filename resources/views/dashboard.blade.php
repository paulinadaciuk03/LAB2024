<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container-fluid vh-100 d-flex align-items-center justify-content-center">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Escuela</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('students.index') }}" class="nav-link">Estudiantes</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('courses.index') }}" class="nav-link">Cursos</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('commissions.index') }}" class="nav-link">Comisiones</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('subjects.index') }}" class="nav-link">Materias</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('professors.index') }}" class="nav-link">Profesores</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('course_students.index') }}" class="nav-link">Inscribir un Alumno</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
</body>
</html>
