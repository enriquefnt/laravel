<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('casos', function (Blueprint $table) {
        $table->datetime('fecha_hora_salida')->nullable()->after('destino');
        $table->datetime('fecha_hora_llegada')->nullable()->after('fecha_hora_salida');  // Nuevo campo combinado
        // Opcional: Copia datos existentes si hay
        //$table->statement('UPDATE casos SET fecha_hora_solicitud = CONCAT(fecha_solicitud, " ", hora_solicitud)');
        $table->dropColumn(['horario_salida','horario_llegada']);  // Elimina los separados

    });
}
public function down()
{
    Schema::table('casos', function (Blueprint $table) {
        $table->time('horario_salida')->nullable()->after('idestino');
        $table->time('horario_llegada')->nullable()->after('horario_salida');
        $table->dropColumn(['fecha_hora_salida','fecha_hora_llegada']);
    });
}
};
