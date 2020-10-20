<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Asesor;
use App\Archivo;
use App\Localidad;
use App\Tipo_de_referente;

class ProyectoController extends Controller
{

  public function new()
  {
    $localidades = Localidad::all();
    $asesores = Asesor::all();
    $tipo_de_referentes = Tipo_de_referente::all();
    return view('/addproyecto', compact('asesores','localidades', 'tipo_de_referentes'));
  }

}
