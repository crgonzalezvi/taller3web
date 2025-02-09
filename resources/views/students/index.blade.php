<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(session('success'))
        <div style="color: green; font-weight: bold;">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div style="color: red; font-weight: bold;">
            {{ session('error') }}
        </div>
    @endif
    
    <form action="{{ route('students.inscript') }}" method="POST">
    
        @csrf

        <div class="mb-3">
            <label for="course_id" class="form-label">Seleccione una Materia</label>
            <select class="form-control" id="course_id" name="course_id" required>
                <option value="">Seleccione una materia</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Inscribirse</button>
    </form>
</body>
</html>
