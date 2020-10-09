<?php

use App\User;
use App\Proyecto;

  // https://stackoverflow.com/questions/35332784/how-to-call-a-controller-function-inside-a-view-in-laravel-5
  // https://styde.net/como-crear-helpers-personalizados-en-laravel/
  // Encontre esta solucion para el uso de funciones globales
  // Recordar pegar la siguiente linea en composer.json autoload
  // "files": [
  //     "app/Http/Helpers/helpers.php"
  // ]


  function estados($estados)
  {
    $estados_array = explode(',', $estados);

    return $estados_array;
  }

  function precio($precio)
  {
    $precio = number_format($precio, 0, '.', '.');

    return $precio;
  }

?>
