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
    <h1 class="my-4">Profesores</h1>
    <a href="{{ route('professors.create') }}" class="btn btn-success mb-3">Nuevo Profesor</a>
    <a href="{{ url('/') }}" class="btn btn-primary mb-3">Volver</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($professors as $professor)
            <tr>
                <td>{{ $professor->name }}</td>
                <td>
                    <a href="{{ route('professors.edit', $professor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('professors.destroy', $professor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este profesor?')">Eliminar</button>
                        
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>