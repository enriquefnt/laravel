@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
    <h1 class="mb-4">Crear Nuevo Usuario</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST" class="row g-3">
        @csrf <!-- Protección CSRF -->

        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>

        <div class="col-md-6">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>

        <div class="col-md-6">
            <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
        </div>

        <div class="col-md-6">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="col-md-6">
        <label for="funcion" class="form-label">Función</label>
        <select class="form-control" id="funcion" name="funcion" required>
        <option value="">Selecciona una función</option>
        <option value="gestor">Gestor</option>
        <option value="administrador">Administrador</option>
        <option value="usuario">Usuario</option>
        <option value="auditor">Auditor</option>
        <option value="otros">Otros</option>
    </select>
</div>

        <div class="col-12">
            <label for="institucion" class="form-label">Institución</label>
            <input type="text" class="form-control" id="institucion" name="institucion" required>
        </div>

        <div class="col-12">
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>
    </form>
@endsection