<?php

use Carbon\Carbon;

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

  // Consulta si el proyecto tiene asesor asignado
  function tieneAsesor($proyecto)
  {
    if($proyecto->asesor_id) {
      return true;
    } else {
      return false;
    }
  }

  // Convierte la fecha del created_at en una fecha con formato: 'Diciembre 2020'
  function fecha($date)
  {
    Carbon::setLocale('es');
    $date = $date->isoFormat('MMMM YYYY');
    // $date = $date->toDateString();
    // $date = $date->toFormattedDateString();

    return $date;
  }

  // Pregunta si hay un usuario logueado y si ese usuario es administrador da true
  function isAdmin(){
    if(Auth::user())
    {
      if(Auth::user()->is_admin){
        return true;
      }
    }
      return false;
  }

  function cantidadInversores($asesor)
  {

    // Creo una variable contador de inversores
    $cantidadDeInversores = 0;

    // Recorro cada proyecto del asesor
    foreach ($asesor->proyectos as $proyecto) {
      // Recorro los referentes de cada proyecto
      foreach ($proyecto->referentes as $referente) {
        // Si el referente es un inversor lo sumo a la variable cantidadDeInversores
        if ($referente->tipo_de_referente_id == 3) {
          $cantidadDeInversores = $cantidadDeInversores + 1;
        }
      }
    }
    return $cantidadDeInversores;
  }

  function referentes($proyecto, $tipo_de_referente_id)
  {
    $arrayReferentes = [];
    foreach($proyecto->referentes as $referente) {
      if ($referente->tipo_de_referente_id == $tipo_de_referente_id) {
        $arrayReferentes[] = $referente;
      }
    }
    return $arrayReferentes;
  }

  // Chequea cuanto dinero disponible tiene el usuario para invertir
  function montoDisponible($user)
  {
    $billetera = $user->billetera;
    $montoDisponible = precio($billetera->total - $billetera->invertido);

    return $montoDisponible;
  }



?>
