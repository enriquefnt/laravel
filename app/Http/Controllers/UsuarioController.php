<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    // Método para mostrar el formulario
    public function create()
    {
        return view('usuarios.create');
    }

    // Método para guardar el usuario
    public function store(Request $request)
    {
        // Validación de inputs
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'nombre_usuario' => 'required|string|max:255|unique:usuarios',
            'password' => 'required|string|min:8',
            'email' => 'required|email|unique:usuarios',
            'funcion' => 'required|in:gestor,administrador,usuario,auditor,otros', 
            'institucion' => 'required|string|max:255',
        ]);

        // Crear usuario con password hasheada
        Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'nombre_usuario' => $request->nombre_usuario,
            'password' => Hash::make($request->password), // Hash automático
            'email' => $request->email,
            'funcion' => $request->funcion,
            'institucion' => $request->institucion,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.create')->with('success', 'Usuario creado exitosamente!');
    }
}