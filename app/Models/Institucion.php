<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    use HasFactory;
    protected $table = 'Institucion'; // Especifica la tabla
    protected $fillable = ['NOMBRE', 'Nombre_aop', 'LOCALIDAD', 'AOP', 'establecimiento_id'];

}
