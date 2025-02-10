@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4">
        <h1 class="text-center mb-4">Inscripción a Materias</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Éxito!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>¡Error!</strong> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('students.inscript') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="course_id" class="form-label">Seleccione una Materia</label>
                <select class="form-select" id="course_id" name="course_id" required>
                    <option value="">Seleccione una materia</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Inscribirse</button>
            </div>
        </form>
    </div>
</div>
@endsection
