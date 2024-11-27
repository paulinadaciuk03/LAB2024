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
    <h1 class="my-4">Nuevo Profesor</h1>
    <form action="{{ route('professors.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <a href="{{ url('/professors') }}" class="btn btn-secondary mt-3">Volver</a>
        <button type="submit" class="btn btn-primary mt-3">Crear Profesor</button>
    </form>
</div>
</body>
</html>