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
    <h1 class="my-4">Comisiones</h1>
    <form action="{{ route('commissions.index') }}" method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <select name="course_id" class="form-control mb-2">
                    <option value="">Seleccionar Curso</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}" {{ request('course_id') == $course->id ? 'selected' : '' }}>
                            {{ $course->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" name="schedule" class="form-control mb-2" placeholder="Buscar por horario" value="{{ request('schedule') }}">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
    </form>

    <a href="{{ route('commissions.create') }}" class="btn btn-success mb-3">Nueva Comisión</a>
    <a href="{{ route('commissions.exportPdf') }}" class="btn btn-danger mb-3">Descargar PDF</a>
    <a href="{{ url('/') }}" class="btn btn-secondary mb-3">Volver</a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Aula</th>
                <th>Horario</th>
                <th>Curso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($commissions as $commission)
            <tr>
                <td>{{ $commission->classroom }}</td>
                <td>{{ $commission->schedule }}</td>
                <td>{{ $commission->course->name }}</td>
                <td>
                    <a href="{{ route('commissions.edit', $commission->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('commissions.destroy', $commission->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar esta comisión?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>