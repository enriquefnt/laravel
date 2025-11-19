<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('casos', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha_solicitud');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('sexo');
            $table->string('fechanacimiento');
            $table->string('edad');
            $table->string('tipodocumento');
            $table->string('nrodocumento');
            $table->string('domicilio');
            $table->string('localidad');
            $table->string('telefono');
            $table->string('obrasocial');
            $table->string('nroafiliado');
            $table->string('acompaniante');
            $table->string('dni_acompaniante');
            $table->string('medico_solicitante');
            $table->string('institucion_solicitante');
            $table->string('motivo_traslado');
            $table->string('codigo_traslado');
            $table->string('origen');
            $table->string('destino');   
            $table->time('horario_salida');
            $table->time('horario_llegada');
            $table->string('aeronave');
            $table->string('medico_aeroevacuador');
            $table->string('enfermero_aeroevacuador');
            $table->string('estado_viaaerea');
            $table->string('estado_respiratorio');
            $table->string('estado_cardiovascular');
            $table->string('estado_neurologico');
            $table->text('otros');
            $table->text('epicrisis');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casos');
    }
};
