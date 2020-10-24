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

  // A esta funcion le pasas estados separados con coma y te los guarda en un array
  function estados($estados)
  {
    $estados_array = explode(',', $estados);

    return $estados_array;
  }

  // Esta funcion transforma un precio con este formato 1000 en este formato 1.000
  function precio($precio)
  {
    $precio = number_format($precio, 0, '.', '.');

    return $precio;
  }

  // A esta funcion le pasas un objeto proyecto y te devuelve un array con las imagenes del mismo
  function imagenesProyecto($proyecto)
  {

    $arrayImagenes = [];
    foreach ($proyecto->archivos as $archivo) {
      if (isset($archivo->imagen)) {
        $arrayImagenes[] = array("id" => $archivo->id, "path" => $archivo->imagen, "nombre_archivo" => $archivo->nombre_documento);
      }
    }

    return $arrayImagenes;
  }

  // A esta funcion le pasas un objeto proyecto y te devuelve un array con los logos del mismo
  function logosProyecto($proyecto)
  {

    $arrayLogos = [];
    foreach ($proyecto->archivos as $archivo) {
      if (isset($archivo->logo)) {
        $arrayLogos[] = array("id" => $archivo->id, "path" => $archivo->logo, "nombre_archivo" => $archivo->nombre_documento);
      }
    }

    return $arrayLogos;
  }

  // A esta funcion le pasas un objeto proyecto y te devuelve un array con los documentos del mismo
  function documentosProyecto($proyecto)
  {

    $arrayDocumentos = [];
    foreach ($proyecto->archivos as $archivo) {
      if (isset($archivo->documento)) {
        $arrayDocumentos[] = array("id" => $archivo->id, "path" => $archivo->documento, "nombre_archivo" => $archivo->nombre_documento);
      }
    }

    return $arrayDocumentos;
  }

  // Consulta si el proyecto tiene documentos
  function tienedocumentos($proyecto)
  {
    if(!empty(documentosProyecto($proyecto))) {
      return true;
    } else {
      return false;
    }
  }

  // Consulta si el proyecto tiene imagenes
  function tieneimagenes($proyecto)
  {
    if(!empty(imagenesProyecto($proyecto))) {
      return true;
    } else {
      return false;
    }
  }

  // Consulta si el proyecto tiene logos
  function tienelogos($proyecto)
  {
    if(!empty(logosProyecto($proyecto))) {
      return true;
    } else {
      return false;
    }
  }


?>
