<?php

namespace App\Http\Controllers;

use App\Models\Casos;
use Illuminate\Http\Request;

class CasosController extends Controller
{
    // Método para mostrar el formulario
    public function create()
    {
        return view('casos.create');
    }

    // Método para guardar el usuario
    public function store(Request $request)
    {
        // Validación de inputs
        $request->validate([
            'fecha_solicitud' => 'required|date',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'sexo' => 'required|in:M,F,O',
            'fechanacimiento' => 'required|date',
            'edad' => 'required|integer|min:0',
            'tipodocumento' => 'required|string|max:50',
            'nrodocumento' => 'required|string|max:100|unique:usuarios',
            'domicilio' => 'required|string|max:255',
            'localidad' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
            'obrasocial' => 'required|string|max:255',
            'nroafiliado' => 'required|string|max:100',
            'acompaniante' => 'nullable|string|max:255',
            'dni_acompaniante' => 'nullable|string|max:100',
            'medico_solicitante' => 'required|string|max:255',
            'institucion_solicitante' => 'required|string|max:255',
            'motivo_traslado' => 'required|string|max:500',
            'codigo_traslado' => 'required|string|max:100',
            'origen' => 'required|string|max:255',
            'destino' => 'required|string|max:255',
            'horario_salida' => 'required|date_format:H:i',
            'horario_llegada' => 'required|date_format:H:i',
            'aeronave' => 'required|string|max:255',
            'medico_aeroevacuador' => 'required|string|max:255',
            'enfermero_aeroevacuador' => 'required|string|max:255',
            'estado_viaaerea' => 'required|string|max:500',
            'estado_respiratorio' => 'required|string|max:500',
            'estado_cardiovascular' => 'required|string|max:500',
            'estado_neurologico' => 'required|string|max:500',
            'otros' => 'nullable|string|max:1000',
            'epicrisis' => 'nullable|string|max:2000',

            
        ]);

        // Crear usuario con password hasheada
        Casos::create([
            'fecha_solicitud' => $request->fecha_solicitud,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'sexo' => $request->sexo,
            'fechanacimiento' => $request->fechanacimiento,
            'edad' => $request->edad,
            'tipodocumento' => $request->tipodocumento,
            'nrodocumento' => $request->nrodocumento,
            'domicilio' => $request->domicilio,
            'localidad' => $request->localidad,
            'telefono' => $request->telefono,
            'obrasocial' => $request->obrasocial,
            'nroafiliado' => $request->nroafiliado,
            'acompaniante' => $request->acompaniante,
            'dni_acompaniante' => $request->dni_acompaniante,
            'medico_solicitante' => $request->medico_solicitante,
            'institucion_solicitante' => $request->institucion_solicitante,
            'motivo_traslado' => $request->motivo_traslado,
            'codigo_traslado' => $request->codigo_traslado,
            'origen' => $request->origen,
            'destino' => $request->destino,
            'horario_salida' => $request->horario_salida,
            'horario_llegada' => $request->horario_llegada,
            'aeronave' => $request->aeronave,
            'medico_aeroevacuador' => $request->medico_aeroevacuador,
            'enfermero_aeroevacuador' => $request->enfermero_aeroevacuador,
            'estado_viaaerea' => $request->estado_viaaerea,
            'estado_respiratorio' => $request->estado_respiratorio,
            'estado_cardiovascular' => $request->estado_cardiovascular,
            'estado_neurologico' => $request->estado_neurologico,
            'otros' => $request->otros,
            'epicrisis' => $request->epicrisis,
           
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->route('usuarios.create')->with('success', 'Usuario creado exitosamente!');
    } //
}
/*
[
       'fecha_solicitud', 'nombre', 'apellido', 'sexo', 'fechanacimiento', 'edad', 'tipodocumento',
        'nrodocumento', 'domicilio', 'localidad', 'telefono', 'obrasocial', 'nroafiliado', 'acompaniante',
         'dni_acompaniante', 'medico_solicitante', 'institucion_solicitante', 'motivo_traslado', 'codigo_traslado',
          'origen', 'destino', 'horario_salida', 'horario_llegada', 'aeronave', 'medico_aeroevacuador', 
          'enfermero_aeroevacuador','estado_viaaerea', 'estado_respiratorio', 'estado_cardiovascular',
           'estado_neurologico', 'otros', 'epicrisis'
    ]
/*