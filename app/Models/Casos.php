<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Casos extends Model
{
    use HasFactory;
    protected $table = 'casos';
     protected $fillable = [
         'fecha_hora_solicitud', 'nombre', 'apellido', 'sexo', 'fechanacimiento', 'edad', 'tipodocumento',
         'nrodocumento', 'domicilio', 'localidad', 'telefono', 'obrasocial', 'nroafiliado', 'acompaniante',
         'dni_acompaniante', 'medico_solicitante', 'institucion_solicitante', 'motivo_traslado', 'codigo_traslado',
         'origen', 'destino', 'fecha_hora_salida', 'fecha_hora_llegada', 'aeronave', 'medico_aeroevacuador',
         'enfermero_aeroevacuador', 'estado_viaaerea', 'estado_respiratorio', 'estado_cardiovascular',
         'estado_neurologico', 'otros', 'epicrisis'
     ];
}
