<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billetera;
use App\User;

class AdminController extends Controller
{
  public function acreditar(int $id, Request $request)
  {

    $billetera = Billetera::find($id);

    // Le sumamos el monto acreditado al total que hay en la billetera actualmente
    $billetera->total = $billetera->total + $request->monto;
    $billetera->save();

    Mail::send(new Acreditacion($request));

    return redirect()->back()->with('status', 'Acreditación realizada correctamente');

  }

  public function invertir(Request $request, int $id)
  {
    $user = User::find($id);
    $billetera = Billetera::find($id);
    //WIP !! ESTA BIEN EL COMPARADOR ? 
    if ($request->monto >= $billetera->total - $billetera->invertido) {
      return back()->with('error', 'No puede invertir más dinero del que que posee en su billetera');

      
    } else {
      //WIP !! 
      $billetera = $user->billetera;
      $invertido = $request->invertido;
      $proyecto_id = $request->proyecto_id;
      $user_id = $user->id;

      $user->proyectos()->attach($id, array('invertido' => $invertido, 'proyecto_id' => $proyecto_id, 'user_id' => $user_id));
      $user->save();

      return back()->with('status', 'Inversión realizada correctamente');
    }
  }

  public function deleteimage(Request $request)
  {
    // Selecciono el id del archivo donde se encuentra la imagen
    $archivo = Archivo::where('id', "=", $request->id)->get();
    // elimino la imagen de storage
    unlink(storage_path('app/public/').$archivo->first()->imagen);
    // borramos el archivo
    $archivo->first()->delete();

    // nos retorna a la ruta anterior
    return redirect()->back();
  }

  public function deletelogo(Request $request)
  {
    // Selecciono el id del archivo donde se encuentra el logo
    $archivo = Archivo::where('id', "=", $request->id)->get();
    // elimino la imagen de storage
    unlink(storage_path('app/public/').$archivo->first()->logo);
    // borramos el archivo
    $archivo->first()->delete();

    // nos retorna a la ruta anterior
    return redirect()->back();
  }

  public function deletedocumento(Request $request)
  {
    // Selecciono el id del archivo donde se encuentra el documento
    $archivo = Archivo::where('id', "=", $request->id)->get();
    // elimino el documento de storage
    unlink(storage_path('app/public/').$archivo->first()->documento);
    // borramos el archivo
    $archivo->first()->delete();

    // nos retorna a la ruta anterior
    return redirect()->back()
          ->with('status', 'Documento eliminado exitosamente');
  }
}
