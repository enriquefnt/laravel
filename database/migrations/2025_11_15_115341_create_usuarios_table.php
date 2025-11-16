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
    Schema::create('usuarios', function (Blueprint $table) {
        $table->id(); // ID único automático
        $table->string('nombre');
        $table->string('apellido');
        $table->string('nombre_usuario')->unique(); // Único para evitar duplicados
        $table->string('password'); // Laravel hashea automáticamente al guardar
        $table->string('email')->unique();
        $table->string('funcion');
        $table->string('institucion');
        $table->timestamp('fecha_agregado')->useCurrent(); // Fecha automática al crear
        $table->timestamps(); // created_at y updated_at
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
