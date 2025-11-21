<?php

namespace App\Http\Controllers;

use App\Models\Casos;  // Nota: Convencionalmente, el modelo debería ser 'Caso' (singular), pero mantengo 'Casos' como en tu código
use Illuminate\Http\Request;
use App\Helpers\EdadHelper;

class CasosController extends Controller
{
    // Método para mostrar el formulario
    public function create()
    {
        return view('casos.create');
    }

    // Método para guardar el caso
    public function store(Request $request)
    {
        // Validación de inputs (corregí typos y quité validación de 'edad' ya que se calcula)
         //dd('Datos crudos: ', $request->all());  // Agrega esto al inicio

        $request->validate([
            'fecha_hora_solicitud' => 'required|date',  // Cambié de 'ffecha_hora_solicitud' y 'date_format:H:i' a 'date' para datetime-local
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'sexo' => 'required|in:M,F,O',
            'fechanacimiento' => 'required|date',
            // 'edad' => QUITADO: Se calcula automáticamente, no se valida como input
            'tipodocumento' => 'required|string|max:50',
            'nrodocumento' => 'nullable|string|max:8',
            'domicilio' => 'nullable|string|max:255',
            'localidad' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:50',
            'obrasocial' => 'nullable|string|max:255',
            'nroafiliado' => 'nullable|string|max:25',
            'acompaniante' => 'nullable|string|max:255',
            'dni_acompaniante' => 'nullable|string|max:100',
            'medico_solicitante' => 'nullable|string|max:255',
            'institucion_solicitante' => 'nullable|string|max:255',  // Corregí 'rnullable' a 'nullable'
            'motivo_traslado' => 'nullable|string|max:500',
            'codigo_traslado' => 'nullable|string|max:100',
            'origen' => 'nullable|string|max:255',
            'destino' => 'nullable|string|max:255',
            'fecha_hora_salida' => 'nullable|date',  // Cambié a 'date' para consistencia
            'fecha_hora_llegada' => 'nullable|date',
            'aeronave' => 'nullable|string|max:255',
            'medico_aeroevacuador' => 'nullable|string|max:255',
            'enfermero_aeroevacuador' => 'nullable|string|max:255',
            'estado_viaaerea' => 'nullable|string|max:500',
            'estado_respiratorio' => 'nullable|string|max:500',
            'estado_cardiovascular' => 'nullable|string|max:500',  // Corregí 'rnullable' a 'nullable'
            'estado_neurologico' => 'nullable|string|max:500',
            'otros' => 'nullable|string|max:1000',
            'epicrisis' => 'nullable|string|max:2000',
        ]);
        dd('Datos validados: ', $request->all());  // Agrega esto

        // Calcular la edad usando el helper
        $edadCalculada = EdadHelper::calcularEdad($request->fechanacimiento);
        dd('Edad calculada: ', $edadCalculada);  // Verifica el cálculo

        // Crear caso con la edad calculada
        Casos::create([
            'fecha_hora_solicitud' => $request->fecha_hora_solicitud,
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'sexo' => $request->sexo,
            'fechanacimiento' => $request->fechanacimiento,
            'edad' => $edadCalculada,  // Asigna el valor calculado en lugar de $request->edad
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
        dd('Caso creado: ', $casos);  // Verifica si se crea el objeto
        // Redirigir con mensaje de éxito: volver a la página anterior en vez de usar una ruta nombrada no existente
        // return redirect()->back()->with('success', 'Caso creado exitosamente!');
         return redirect()->route('casos.create')->with('success', 'Cargado exitosamente!');
    }
}