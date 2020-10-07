<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function prueba()
    {
      // Escribimos todos los estados separados con coma
      $estados = "busqueda, definicion, idea, prototipo, prueba";

      // Usamos la referencia de la coma para convertir el estado en un array
      $array_estados = explode(',', $estados);

      // Contamos cuantas posiciones tiene el array para tener el 100%
      $cantidad_estados = count($array_estados);

      // Creamos un array vacio que va a servir como enumerador/contador
      // $contador = [];

      // Vamos sumando de uno en uno hasta llegar al numero máximo del array estado
      // for ($i=1; $i <= $cantidad_estados ; $i++) {
        // $contador[] = $i;
      // }

      $vac = compact('array_estados', 'cantidad_estados');
      return view('prueba', $vac);
    }
}
