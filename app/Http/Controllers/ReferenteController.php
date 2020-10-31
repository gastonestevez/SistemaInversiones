<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipo_de_referente;

class ReferenteController extends Controller
{
  public function directory()
  {
    $referentes = Tipo_de_referente::all();
    $vac = compact('referentes');

    return view('/referentes', $vac);
  }

  public function store(Request $request)
  {

    $referente = new Tipo_de_referente();
    $referente->tipo = $request->tipo;

    $referente->save();

    return redirect()->back()
          ->with('status', 'Referente creada exitosamente');

  }

  public function update(Request $request, int $id)
    {
      $referente = Tipo_de_referente::find($id);
      $referente->tipo = $request->tipo;

      $referente->save();

      return redirect()->back()
            ->with('status', 'Referente modificada exitosamente');
    }

    public function destroy(int $id)
    {
      $referente = Tipo_de_referente::find($id);
      $referente->delete();

      return redirect()->back()
            ->with('status', 'Referente modificada exitosamente');
    }
}
