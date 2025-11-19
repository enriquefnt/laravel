<?php
use Illuminate\Support\Facades\Route;
use App\Models\Institucion;
use Illuminate\Http\Request;

  Route::get('/instituciones/search', function (Request $request) {
      $query = $request->get('q');
      $instituciones = Institucion::where('Nombre_aop', 'LIKE', "%{$query}%")
                                  ->select('Nombre_aop')
                                  ->limit(10)
                                  ->get();
      return response()->json($instituciones);
  });