<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration
{
    public function up()
    {
        Schema::table('casos', function (Blueprint $table) {
            // Cambia 'edad' de integer a string para almacenar el cálculo (ej. "25 a 3 m")
            $table->string('edad')->nullable()->change();
        });
    }
    public function down()
    {
        Schema::table('casos', function (Blueprint $table) {
            // Revertir a integer si es necesario
            $table->integer('edad')->nullable()->change();
        });
    }
};
