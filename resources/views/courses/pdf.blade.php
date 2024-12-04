<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Cursos por Materia</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .subject {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Reporte de Cursos por Materia</h1>
    @foreach ($courses as $subject => $coursesList)
        <div class="subject">
            <h2>Materia: {{ $subject }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>Curso</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coursesList as $course)
                        <tr>
                            <td>{{ $course->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
</body>
</html>
