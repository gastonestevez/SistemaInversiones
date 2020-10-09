<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Actualizacion;
use App\User;
use App\Archivo;
use App\Asesor;
use App\Billetera;
use App\Localidad;
use App\Referente;
use App\Tipo_de_referente;
use App\Proyecto;

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

      $actualizaciones = Actualizacion::all();
      $usuarios = User::all();
      $archivos = Archivo::all();
      $asesores = Asesor::all();
      $billeteras = Billetera::all();
      $localidades = Localidad::all();
      $proyectos = Proyecto::all();
      $referentes = Referente::all();
      $tipoDeReferentes = tipo_de_referente::all();

      $vac = compact('array_estados', 'cantidad_estados', 'usuarios', 'archivos', 'asesores', 'billeteras', 'localidades', 'proyectos', 'referentes', 'tipoDeReferentes');
      return view('prueba', $vac);
    }

    public function proyecto(string $slug)
    {

      $proyecto = Proyecto::where('slug', '=', $slug)->first();
      $vac = compact('proyecto');

      return  view('/proyecto', $vac);
    }
}
