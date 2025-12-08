<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CasosController;

// Ruta pública para la página de inicio
Route::get('/', [HomeController::class, 'index']);

// Rutas públicas para crear usuarios (si no quieres protegerlas)
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios', [UsuarioController::class, 'store'])->name('usuarios.store');

// Rutas protegidas (requieren login)
Route::middleware('auth')->group(function () {
    // Aquí van rutas que solo usuarios logueados pueden acceder
    Route::get('/casos/create', [CasosController::class, 'create'])->name('casos.create');
    Route::post('/casos', [CasosController::class, 'store'])->name('casos.store');
    Route::get('/casos', [CasosController::class, 'index'])->name('casos.index');
    Route::get('/casos/{id}', [CasosController::class, 'show'])->name('casos.show');
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});


require __DIR__.'/auth.php';
