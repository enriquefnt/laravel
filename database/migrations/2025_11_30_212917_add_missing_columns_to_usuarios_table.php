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
    Schema::table('usuarios', function (Blueprint $table) {
        $table->rememberToken();  // Agrega 'remember_token' (varchar, nullable)
        $table->timestamp('email_verified_at')->nullable();  // Opcional, para verificación de email
        // Si necesitas más campos, agrégalos aquí (ej. si falta algo)
    });
}
public function down()
{
    Schema::table('usuarios', function (Blueprint $table) {
        $table->dropRememberToken();
        $table->dropColumn('email_verified_at');
    });
}

};
