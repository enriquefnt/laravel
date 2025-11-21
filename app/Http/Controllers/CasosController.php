<?php

namespace App\Http\Controllers;

use App\Models\Casos;
use Illuminate\Http\Request;
use App\Helpers\EdadHelper;
use Illuminate\Support\Facades\Log;  // Agrega para logs

class CasosController extends Controller
{
    // Método para mostrar el formulario
    public function create()
    {
        return view('casos.create');
    }
    public function index()
    {
        $casos = Casos::all();  // Obtiene todos los casos (puedes paginar después)
        return view('casos.index', compact('casos'));  // Pasa los casos a la vista
    }

    // Método para guardar el caso
    public function store(Request $request)
    {
        // Validación de inputs (ajusté algunos a 'required' para coincidir con DB NOT NULL)
        $request->validate([
            'fecha_hora_solicitud' => 'required|date',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'sexo' => 'required|in:Masculino,Femenino,Otro',  // Ajusté a los valores del select
            'fechanacimiento' => 'required|date',
            'tipodocumento' => 'required|in:DNI,Pasaporte,Cédula,Otro',  // Ajusté a los valores del select
            'nrodocumento' => 'required|string|max:8',  // Cambié a required (DB NOT NULL)
            'domicilio' => 'required|string|max:255',  // Cambié a required
            'localidad' => 'required|string|max:255',  // Cambié a required
            'telefono' => 'required|string|max:50',  // Cambié a required
            'obrasocial' => 'required|string|max:255',  // Cambié a required
            'nroafiliado' => 'required|string|max:25',  // Cambié a required
            'acompaniante' => 'required|string|max:255',  // Cambié a required
            'dni_acompaniante' => 'required|string|max:100',  // Cambié a required
            'medico_solicitante' => 'required|string|max:255',  // Cambié a required
            'institucion_solicitante' => 'required|string|max:255',  // Cambié a required
            'motivo_traslado' => 'required|string|max:500',  // Cambié a required
            'codigo_traslado' => 'required|in:verde,amarillo,rojo',  // Ajusté a los valores del radio
            'origen' => 'required|string|max:255',  // Cambié a required
            'destino' => 'required|string|max:255',  // Cambié a required
            'fecha_hora_salida' => 'required|date',  // Cambié a required
            'fecha_hora_llegada' => 'required|date',  // Cambié a required
            'aeronave' => 'required|string|max:255',  // Cambié a required
            'medico_aeroevacuador' => 'required|string|max:255',  // Cambié a required
            'enfermero_aeroevacuador' => 'required|string|max:255',  // Cambié a required
            'estado_viaaerea' => 'required|in:sin_compromiso,leve,moderado,severo',  // Ajusté a los valores del select
            'estado_respiratorio' => 'required|in:sin_compromiso,leve,moderado,severo',
            'estado_cardiovascular' => 'required|in:sin_compromiso,leve,moderado,severo',
            'estado_neurologico' => 'required|in:sin_compromiso,leve,moderado,severo',
            'otros' => 'required|string|max:1000',  // Cambié a required (DB NOT NULL)
            'epicrisis' => 'required|string|max:2000',  // Cambié a required (DB NOT NULL)
        ]);

        // Calcular la edad usando el helper
        $edadCalculada = EdadHelper::calcularEdad($request->fechanacimiento);

        // Intentar crear el caso con manejo de errores
        try {
            $caso = Casos::create([
                'fecha_hora_solicitud' => $request->fecha_hora_solicitud,
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'sexo' => $request->sexo,
                'fechanacimiento' => $request->fechanacimiento,
                'edad' => $edadCalculada,
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
                'fecha_hora_salida' => $request->fecha_hora_salida,
                'fecha_hora_llegada' => $request->fecha_hora_llegada,
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

            // Log para confirmar guardado
            Log::info('Caso creado exitosamente: ', $caso->toArray());

            // Redirigir a la lista de casos (ajusta si no tienes 'casos.index')
            //return redirect()->route('casos.index')->with('success', 'Caso creado exitosamente!');
            return redirect()->route('casos.create')->with('success', 'Caso creado exitosamente!');
        } catch (\Exception $e) {
            // Log del error y redirigir con mensaje
            Log::error('Error al crear caso: ' . $e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Error al guardar el caso: ' . $e->getMessage()]);
        }
    }

    // Método para listar casos
    
}