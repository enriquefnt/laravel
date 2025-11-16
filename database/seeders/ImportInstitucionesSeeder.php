<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Institucion;

class ImportInstitucionesSeeder extends Seeder
{
    public function run()
    {
        // Conecta a la DB externa
        $externalData = DB::connection('external')
            ->table('institucion')  // Nombre de tu tabla externa
            ->select('NOMBRE', 'Nombre_aop', 'LOCALIDAD', 'AOP', 'establecimiento_id')  // Solo el campo que tienes (ajusta si hay más)
            ->get();

        // Inserta en la nueva tabla (Laravel maneja id y timestamps)
        foreach ($externalData as $data) {
            Institucion::create([
                'NOMBRE' => $data->nombre,
                'Nombre_aop' => $data->Nombre_aop,
                'AOP' => $data->AOP,
                'LOCALIDAD' => $data->LOCALIDAD,
                'establecimiento_id' => $data->establecimiento_id
                // Agrega más campos si coinciden
            ]);
        }
    }
}