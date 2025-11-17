<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;  
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;
    protected $table = 'instituciones';  // Cambia a plural
    protected $fillable = ['NOMBRE', 'Nombre_aop', 'LOCALIDAD', 'AOP', 'establecimiento_id'];

}
