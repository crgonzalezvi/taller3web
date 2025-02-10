@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h1 class="text-center">Lista de Estudiantes</h1>
        </div>
        <div class="card-body">

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if($students->isEmpty())
                <p class="text-center text-muted">No hay estudiantes en este curso.</p>
            @else
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Nota Actual</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->user->name }}</td>
                                <td>{{ $student->nota ?? 'Sin nota' }}</td>
                                <td>
                                    <form action="{{ route('teacher.updateGrade', $student->id) }}" method="POST" class="d-flex">
                                        @csrf
                                        <input type="number" name="grade" step="0.1" min="0" max="10" placeholder="Nueva nota" class="form-control me-2" required>
                                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection
