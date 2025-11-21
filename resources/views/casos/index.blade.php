@extends('layouts.app')

@section('content')
    <h1>Lista de Casos</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('casos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Caso</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($casos as $caso)
                <tr>
                    <td>{{ $caso->id }}</td>
                    <td>{{ $caso->nombre }}</td>
                    <td>{{ $caso->apellido }}</td>
                    <td>{{ $caso->edad }}</td>
                    <td>
                        <!-- Agrega botones para editar/ver si quieres -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection