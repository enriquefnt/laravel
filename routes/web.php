<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\UsuarioController;

// Ruta para mostrar el formulario
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');

// Ruta para procesar el formulario (POST)
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

