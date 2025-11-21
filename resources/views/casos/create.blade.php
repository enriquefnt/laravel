@extends('layouts.app')

@section('title', 'registrar')

@section('content')
    <h1 class="mb-4">Datos Traslado</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif


<form action="{{ route('casos.store') }}" method="POST" class="row g-3">
    @csrf <!-- Protección CSRF -->
    
    <div class="col-md-6">
    <label for="fecha_hora_solicitud" class="form-label">Fecha y Hora de Solicitud</label>
    <input type="datetime-local" class="form-control" id="fecha_hora_solicitud" name="fecha_hora_solicitud" required>
</div>
 
<div class="col-md-6">
        <label for="institucion_solicitante" class="form-label">Institución Solicitante</label>
        <input type="text" class="form-control" id="institucion_solicitante" name="institucion_solicitante" required>
    </div>

    <div class="col-md-6">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>

    <div class="col-md-6">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" class="form-control" id="apellido" name="apellido" required>
    </div>

    <div class="col-md-4">
        <label for="sexo" class="form-label">Sexo</label>
        <select class="form-select" id="sexo" name="sexo" required>
            <option value="">Seleccionar...</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
        </select>
    </div>

    <div class="col-md-4">
        <label for="fechanacimiento" class="form-label">Fecha de Nacimiento</label>
        <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento" required>
    </div>

   <div class="col-md-4">
    <label for="edad" class="form-label">Edad</label>
    <input type="text" class="form-control" id="edad" name="edad" readonly required>
</div>

    <div class="col-md-6">
        <label for="tipodocumento" class="form-label">Tipo de Documento</label>
        <select class="form-select" id="tipodocumento" name="tipodocumento" required>
            <option value="">Seleccionar...</option>
            <option value="DNI">DNI</option>
            <option value="Pasaporte">Pasaporte</option>
            <option value="Cédula">Cédula</option>
            <option value="Otro">Otro</option>
        </select>
    </div>

    <div class="col-md-6">
        <label for="nrodocumento" class="form-label">Número de Documento</label>
        <input type="text" class="form-control" id="nrodocumento" name="nrodocumento" required>
    </div>

    <div class="col-md-6">
        <label for="domicilio" class="form-label">Domicilio</label>
        <input type="text" class="form-control" id="domicilio" name="domicilio" required>
    </div>

    <div class="col-md-3">
        <label for="localidad" class="form-label">Localidad</label>
        <input type="text" class="form-control" id="localidad" name="localidad" required>
    </div>

    <div class="col-md-3">
        <label for="telefono" class="form-label">Teléfono</label>
        <input type="tel" class="form-control" id="telefono" name="telefono" required>
    </div>

    <div class="col-md-6">
        <label for="obrasocial" class="form-label">Obra Social</label>
        <input type="text" class="form-control" id="obrasocial" name="obrasocial">
    </div>

    <div class="col-md-6">
        <label for="nroafiliado" class="form-label">Número de Afiliado</label>
        <input type="text" class="form-control" id="nroafiliado" name="nroafiliado">
    </div>

    <div class="col-md-6">
        <label for="acompaniante" class="form-label">Acompañante</label>
        <input type="text" class="form-control" id="acompaniante" name="acompaniante">
    </div>

    <div class="col-md-6">
        <label for="dni_acompaniante" class="form-label">DNI del Acompañante</label>
        <input type="text" class="form-control" id="dni_acompaniante" name="dni_acompaniante">
    </div>

    <div class="col-md-4">
        <label for="medico_solicitante" class="form-label">Médico Solicitante</label>
        <input type="text" class="form-control" id="medico_solicitante" name="medico_solicitante" required>
    </div>

   

    <div class="col-md-4">
        <label for="motivo_traslado" class="form-label">Motivo del Traslado</label>
        <input type="text" class="form-control" id="motivo_traslado" name="motivo_traslado" required>
    </div>

    <!-- CÓDIGO DE TRASLADO (verde/amarillo/rojo) -->
            <div class="col-md-4 mt-3">
                <label class="form-label">Código de traslado</label>

                <div class="d-flex gap-3">

                    <label class="form-check-label d-flex align-items-center">
                        <input class="form-check-input me-2" type="radio" name="codigo_traslado" value="verde" required>
                        <span class="badge bg-success p-2">Verde</span>
                    </label>

                    <label class="form-check-label d-flex align-items-center">
                        <input class="form-check-input me-2" type="radio" name="codigo_traslado" value="amarillo">
                        <span class="badge bg-warning text-dark p-2">Amarillo</span>
                    </label>

                    <label class="form-check-label d-flex align-items-center">
                        <input class="form-check-input me-2" type="radio" name="codigo_traslado" value="rojo">
                        <span class="badge bg-danger p-2">Rojo</span>
                    </label>

                </div>
            </div>

      
            

    <div class="col-md-6">
        <label for="origen" class="form-label">Origen</label>
        <input type="text" class="form-control" id="origen" name="origen" required>
    </div>

    <div class="col-md-6">
        <label for="destino" class="form-label">Destino</label>
        <input type="text" class="form-control" id="destino" name="destino" required>
    </div>

    <div class="col-md-4">
    <label for="fecha_hora_salida" class="form-label">Fecha y Hora de Salida</label>
    <input type="datetime-local" class="form-control" id="fecha_hora_salida" name="fecha_hora_salida" required>
</div>

<div class="col-md-4">
    <label for="fecha_hora_llegada" class="form-label">Fecha y Hora de llegada</label>
    <input type="datetime-local" class="form-control" id="fecha_hora_llegada" name="fecha_hora_llegada" required>
</div>

    <div class="col-md-4">
        <label for="aeronave" class="form-label">Aeronave</label>
        <input type="text" class="form-control" id="aeronave" name="aeronave" required>
    </div>

    <div class="col-md-6">
        <label for="medico_aeroevacuador" class="form-label">Médico Aeroevacuador</label>
        <input type="text" class="form-control" id="medico_aeroevacuador" name="medico_aeroevacuador" required>
    </div>

    <div class="col-md-6">
        <label for="enfermero_aeroevacuador" class="form-label">Enfermero Aeroevacuador</label>
        <input type="text" class="form-control" id="enfermero_aeroevacuador" name="enfermero_aeroevacuador" required>
    </div>

 <!-- VIA AÉREA -->
            <div class="col-md-3">
                <label class="form-label">Vía aérea</label>
                <div class="input-group">
                    <select name="estado_viaaerea" class="form-select" required>
                       <option value="">Seleccione...</option>
                        <option value="sin_compromiso">1. Sin compromiso</option>
                        <option value="leve">2. Leve</option>
                        <option value="moderado">3. Moderado</option>
                        <option value="severo">4. Severo</option>
                    </select>
                    <span class="input-group-text" 
                    data-bs-toggle="tooltip" 
                    data-bs-html="true"
                    title="1-vía aérea normal, sin riesgo. <br>2-leve riesgo (no protector, estridor leve). <br>3-riesgo alto (estridor moderado, secreciones, disminución del sensorio). <br>4-falla inminente u obstrucción; vía aérea artificial o necesidad de intubación">
                        <i class="bi bi-info-circle"></i>
                    </span>
                </div>
            </div>

            <!-- RESPIRATORIO -->
            <div class="col-md-3">
                <label class="form-label">Respiratorio</label>
                <div class="input-group">
                    <select name="estado_respiratorio" class="form-select" required>
                        <option value="">Seleccione...</option>
                        <option value="sin_compromiso">1. Sin compromiso</option>
                        <option value="leve">2. Leve</option>
                        <option value="moderado">3. Moderado</option>
                        <option value="severo">4. Severo</option>
                    </select>
                    <span class="input-group-text" 
                    data-bs-toggle="tooltip" 
                    data-bs-html="true"
                    title="1-FR normal, sin tiraje, SatO₂ normal. <br>2-taquipnea leve, SatO₂ 92–94% o bajo flujo. <br>3-dificultad marcada, SatO₂ <92% pese a oxígeno, uso de alto flujo. <br>4-falla respiratoria, SatO₂ <90%, necesidad de VM (no invasiva o invasiva)">
                        <i class="bi bi-info-circle"></i>
                    </span>
                </div>
            </div>

            <!-- CARDIOVASCULAR -->
            <div class="col-md-3">
                <label class="form-label">Cardiovascular</label>
                <div class="input-group">
                    <select name="estado_cardiovascular" class="form-select" required>
                       <option value="">Seleccione...</option>
                        <option value="sin_compromiso">1. Sin compromiso</option>
                        <option value="leve">2. Leve</option>
                        <option value="moderado">3. Moderado</option>
                        <option value="severo">4. Severo</option>
                    </select>
                    <span class="input-group-text"
                     data-bs-toggle="tooltip" 
                    data-bs-html="true"
                     title="1-FC/PA normales. <br>2-taquicardia leve, PA límite. <br>3-hipotensión moderada, necesidad de fluidos o inotrópicos en dosis bajas. <br>4-shock, hipotensión significativa, perfusión pobre, inotrópicos en dosis moderadas/altas.">
                        <i class="bi bi-info-circle"></i>
                    </span>
                </div>
            </div>

            <!-- NEUROLÓGICO -->
            <div class="col-md-3">
                <label class="form-label">Neurológico</label>
                <div class="input-group">
                    <select name="estado_neurologico" class="form-select" required>
                        <option value="">Seleccione...</option>
                        <option value="sin_compromiso">1. Sin compromiso</option>
                        <option value="leve">2. Leve</option>
                        <option value="moderado">3. Moderado</option>
                        <option value="severo">4. Severo</option>
                    </select>
                   <span class="input-group-text"
                        data-bs-toggle="tooltip"
                        data-bs-html="true"
                        title="1-alerta, orientado.<br>2-responde a estímulos verbales.<br>3-responde solo al dolor.<br>4-no responde—Glasgow ≤ 8.">
                        <i class="bi bi-info-circle"></i>
                    </span>
                </div>
            </div>

            



    <div class="col-12">
        <label for="otros" class="form-label">Otros</label>
        <textarea class="form-control" id="otros" name="otros" rows="3"></textarea>
    </div>

    <div class="col-12">
        <label for="epicrisis" class="form-label">Epicrisis</label>
        <textarea class="form-control" id="epicrisis" name="epicrisis" rows="3"></textarea>
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Guardar Caso</button>
    </div>
</form>

@endsection
  @section('scripts')

  <script>
    document.addEventListener("DOMContentLoaded", () => {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(el => new bootstrap.Tooltip(el))
    });
</script>
<!-- Incluye jQuery si no está (opcional, Laravel lo tiene en algunos casos) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Función para calcular edad (adaptada de tu PHP)
        function calcularEdad(fechaNacimiento) {
            var nacimiento = new Date(fechaNacimiento);
            var hoy = new Date();
            var edad = new Date(hoy - nacimiento);
            var anios = edad.getUTCFullYear() - 1970;
            var meses = edad.getUTCMonth();
            var dias = edad.getUTCDate() - 1;  // Ajuste para días

            if (anios > 0) {
                return anios + ' a ' + meses + ' m';
            } else {
                return meses + ' m ' + dias + ' d';
            }
        }

        // Evento al cambiar fechanacimiento
        $('#fechanacimiento').on('change', function() {
            var fechaNac = $(this).val();
            if (fechaNac) {
                var edadCalculada = calcularEdad(fechaNac);
                $('#edad').val(edadCalculada);  // Carga el string en el campo edad
            } else {
                $('#edad').val('');  // Limpia si no hay fecha
            }
        });
    });
</script>

  @endsection