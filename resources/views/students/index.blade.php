<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('materias.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="materia">Materia</label>
            <select class="form-control" id="materia" name="materia" required>
                <option value="">Seleccione una materia</option>
                @foreach ($materias as $materia)
                    <option value="{{ $materia->id }}">{{ $materia->name }}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Inscribir</button>
    </form>
</body>
</html>