<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Localidad;

class LocalidadController extends Controller
{

  public function directory()
  {
    $localidades = Localidad::all();
    $vac = compact('localidades');

    return view('/localidades', $vac);
  }

  public function store(Request $request)
  {

    $localidad = new Localidad();
    $localidad->nombre = $request->nombre;

    $localidad->save();

    return redirect()->back()
          ->with('status', 'Localidad creada exitosamente');

  }

  public function update(Request $request, int $id)
    {
      $localidad = Localidad::find($id);
      $localidad->nombre = $request->nombre;

      $localidad->save();

      return redirect()->back()
            ->with('status', 'Localidad modificada exitosamente');
    }

    public function destroy(int $id)
    {
      $localidad = Localidad::find($id);
      $localidad->delete();

      return redirect()->back()
            ->with('status', 'Localidad modificada exitosamente');
    }


}
