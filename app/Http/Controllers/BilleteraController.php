<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billetera;
use App\User;

class BilleteraController extends Controller
{
  public function edit(int $id)
  {
    $billetera = Billetera::find($id);
    $user = User::find($id);
    $vac = compact('billetera', 'user');

    return view('/billetera', $vac);
  }

  public function update(int $id, Request $request)
  {
    $billetera = Billetera::find($id);
    $billetera->total = $request->total;
    $billetera->invertido = $request->invertido;
    $billetera->rentabilidad = $request->rentabilidad;

    $billetera->save();

    return redirect('/usuario/'. $billetera->id)->with('status', 'Billetera actualizada correctamente');
  }
}
