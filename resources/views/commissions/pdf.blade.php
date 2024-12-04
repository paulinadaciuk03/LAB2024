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
    <h1>Reporte de Comisiones</h1>
    <table>
        <thead>
            <tr>
                <th>Aula</th>
                <th>Horario</th>
                <th>Curso</th>
                <th>Profesor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commissions as $commission)
                <tr>
                    <td>{{ $commission->classroom }}</td>
                    <td>{{ $commission->schedule }}</td>
                    <td>{{ $commission->course->name }}</td>
                    <td>{{ $commission->professor->name ?? 'No asignado' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
