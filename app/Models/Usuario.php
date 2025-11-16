<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Usuario extends Model
{
    use HasFactory;
    protected $table = 'usuarios'; // Especifica la tabla
    protected $fillable = [
        'nombre', 'apellido', 'nombre_usuario', 'password', 'email', 'funcion', 'institucion'
    ]; // Campos que se pueden llenar masivamente
    protected $hidden = ['password']; // Oculta password en respuestas JSON
}