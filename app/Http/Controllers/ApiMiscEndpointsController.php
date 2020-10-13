<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Actualizacion;
use App\User;
use App\Archivo;
use App\Asesor;
use App\Localidad;
use App\Referente;
use App\Tipo_de_referente;
use App\Proyecto;

class ApiMiscEndpointsController extends Controller
{
    //

    public function obtenerLocalidades()
    {
        return response()->json(['localidades' => Localidad::all()], 200);
    }

    public function obtenerLocalidad(int $id)
    {
        return response()->json(['localidades' => Localidad::find($id)], 200);
    }

    public function obtenerAsesores()
    {
        return response()->json(['asesores' => Asesor::all()], 200);

    }

}
