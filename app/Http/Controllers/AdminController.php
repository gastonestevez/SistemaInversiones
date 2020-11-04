<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Billetera;
use App\Proyecto;
use App\User;
use App\Mail\Acreditacion;
use Illuminate\Support\Facades\Mail;

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

    // Seleccionamos el usuario y la billetera por el id que pasamos por la query
    $user = User::find($id);
    $billetera = Billetera::find($id);

    // verificamos si el monto que queremos invertir es igual o menor al valor total que tenemos disponible en billetera
    if ($request->monto > $billetera->total) {
      dd('invirtio mas de lo que tiene en billetera');
      return back()->with('error', 'No puede invertir más dinero del que que posee en su billetera');
    }

    // Creamos variables para la tabla intermedia y hacemos el attach
    $invertido = $request->invertido;
    $proyecto_id = $request->proyecto_id;
    $user_id = $user->id;

    // Restamos al total de la billetera la cantidad invertida
    $billetera->total = $billetera->total - $request->invertido;
    $billetera->invertido = $billetera->invertido + $request->invertido;
    // Guardamos la actualizacion
    $billetera->save();

    // Recorro cada proyecto del usuario para ver si está invirtiendo en un proyecto en el que ya invirtió anteriormente
    foreach ($user->proyectos as $proyecto) {
      // Si ya invirtió en el proyecto, tomo el valor invertido anteriormente y le sumo el nuevo valor
      if ($proyecto->inversiones->proyecto_id == $request->proyecto_id) {
        // dd('ya invirtio en este proyecto anteriormente');
        // Le sumamos el nuevo monto de inversion al monto anterior
        $proyecto->inversiones->invertido = $proyecto->inversiones->invertido + $request->invertido;
        $nuevaInversion = $proyecto->inversiones->invertido;
        $user->proyectos()->updateExistingPivot($proyecto_id, ['invertido' => $nuevaInversion]); // https://laravel.com/docs/8.x/eloquent-relationships Updating A Record On A Pivot Table
        return back()->with('status', 'Inversión realizada correctamente');
      }
    }

    // Creamos variables para la tabla intermedia y hacemos el attach
    $invertido = $request->invertido;
    $proyecto_id = $request->proyecto_id;
    $user_id = $user->id;

    // Si los dos casos anteriores no se dan, entonces creo una nueva row en la tabla intermedia (proyecto_usuario) detallando la inversion del usuario
    // dd('nunca invirtio antes en este proyecto');
    $user->proyectos()->attach($id, array('invertido' => $invertido, 'proyecto_id' => $proyecto_id, 'user_id' => $user_id));
    $user->save();

    return back()->with('status', 'Inversión realizada correctamente');
  }

  public function deleteinversion(int $id, Request $request)
  {
    $proyecto = Proyecto::find($id);
    $user = User::find($request->user);

    $proyectosArray = [];
    foreach ($user->proyectos as $proyecto) {
      if ($proyecto->id === $id) {
        $user->proyectos()->detach($id);
      }
    }
    return back()->with('status', 'Inversión eliminada correctamente');
  }

}
