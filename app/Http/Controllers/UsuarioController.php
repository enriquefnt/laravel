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
            'institucion' => 'required|string|exists:instituciones,Nombre_aop',
        ]);

        // Ajustar datos: trim y capitalización
        $data = $request->all();
        $data['nombre'] = ucwords(strtolower(trim($data['nombre'])));
        $data['apellido'] = ucwords(strtolower(trim($data['apellido'])));
        $data['nombre_usuario'] = trim($data['nombre_usuario']);
        // C$data['password'] = trim($data['password']);  // Quita espacios
        $data['password'] = Hash::make($data['password']);  // Luego hashea
        $data['email'] = trim($data['email']);
        $data['funcion'] = trim($data['funcion']);
        $data['institucion'] = trim($data['institucion']);

        // Crear usuario con password hasheada
        Usuario::create($data);

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.create')->with('success', 'Usuario creado exitosamente!');
    }
}
