<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CasosController;

// Ruta para la página de inicio (usando el controlador)
Route::get('/', [HomeController::class, 'index']);

// Rutas para usuarios
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

// Rutas para casos
Route::get('/casos/create', [CasosController::class, 'create'])->name('casos.create');
Route::post('/casos', [CasosController::class, 'store'])->name('casos.store');
Route::get('/casos', [CasosController::class, 'index'])->name('casos.index');
Route::get('/casos/{id}', [CasosController::class, 'show'])->name('casos.show');


