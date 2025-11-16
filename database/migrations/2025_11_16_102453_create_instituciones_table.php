<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *NOMBRE, Nombre_aop, LOCALIDAD, AOP, establecimiento_id
     */
    public function up()
{
    Schema::create('instituciones', function (Blueprint $table) {
        $table->id();
        $table->string('NOMBRE'); 
        $table->string('Nombre_aop'); // Nombre del establecimiento
        $table->string('LOCALIDAD'); 
        $table->string('AOP'); 
        $table->string('establecimiento_id'); 
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('instituciones');
}
     */
    public function down(): void
    {
        Schema::dropIfExists('instituciones');
    }
};
