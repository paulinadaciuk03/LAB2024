<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Reporte de Asistencia de Profesores</h1>
    <table>
        <thead>
            <tr>
                <th>Profesor</th>
                <th>Comisión</th>
                <th>Aula</th>
                <th>Horario</th>
                <th>Curso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($professors as $professor)
                @foreach ($professor->commissions as $commission)
                    <tr>
                        <td>{{ $professor->name }}</td>
                        <td>Comisión {{ $commission->id }}</td>
                        <td>{{ $commission->classroom }}</td>
                        <td>{{ $commission->schedule }}</td>
                        <td>{{ $commission->course->name }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</body>
</html>
