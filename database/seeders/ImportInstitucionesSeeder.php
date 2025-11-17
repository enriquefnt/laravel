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
            ->select('NOMBRE', 'Nombre_aop', 'LOCALIDAD', 'AOP', 'establecimiento_id')
            // ->select('NOMBRE')  
            // ->select('Nombre_aop') 
            // ->select('LOCALIDAD') 
            // ->select('AOP') 
            // ->select('establecimiento_id') // Solo el campo que tienes
            ->get();

        // Inserta en la nueva tabla (Laravel maneja id y timestamps)
        // NOMBRE, Nombre_aop, LOCALIDAD, AOP, establecimiento_id
        foreach ($externalData as $data) {
            Institucion::create([
                'NOMBRE' => $data->NOMBRE,  // Coincide con el modelo
                'Nombre_aop'=> $data->Nombre_aop, 
               'LOCALIDAD'=> $data->LOCALIDAD,
               'AOP'=> $data->AOP,
                'establecimiento_id'=> $data->establecimiento_id

            ]);
        }
    }
}