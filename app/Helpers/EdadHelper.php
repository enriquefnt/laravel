<?php

namespace App\Helpers;

class EdadHelper
{
    public static function calcularEdad($fechaNacimiento, $fechaActual = null)
    {
        $nacimiento = new \DateTime($fechaNacimiento);
        $actual = $fechaActual ? new \DateTime($fechaActual) : new \DateTime();
        $edad = $nacimiento->diff($actual);
        $anios = $edad->y;
        $meses = $edad->m;
        $dias = $edad->d;

        if ($anios > 0) {
            return "$anios a $meses m";
        } else {
            return "$meses m $dias d";
        }
    }
}