<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Billetera;
use App\Proyecto;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Acreditacion; // Por email con detalle de acreditacion de dinero

class UserController extends Controller
{

  public function show(int $id)
  {
    $users = User::all();
    $user = User::find($id);
    // dd($user->proyectos);
    $todosLosProyectos = Proyecto::all();
    $proyectos = $user->proyectos;
    $proyectosDestacados = Proyecto::where('destacado', '=', 1)->inRandomOrder()->get();
    // Si no hay ni un proyecto destacado, mostramos los proyectos comunes
    if (!count($proyectosDestacados)) {
      $proyectosDestacados = Proyecto::all()->random()->limit(5)->get();
    }


    $vac = compact('user', 'users', 'proyectosDestacados', 'proyectos', 'todosLosProyectos');

    return view('/usuario', $vac);
  }

  public function edit(int $id = 0)
  {

    $user = User::find($id ?: Auth::user()->id);
    $vac = compact('user');

    return view('/perfil', $vac);
  }

  public function update(Request $request, int $id)
  {

    $reglas = [
      // 'current_password' => ['required', new MatchOldPassword], // https://itsolutionstuff.com/post/laravel-change-password-with-current-password-validation-exampleexample.html
      'new_password' => 'nullable|min:6|confirmed', // o bien 'new__password_confirmation' => ['same:new_password'],
      'name' =>'alpha|string|min:2|max:40|',
      'email' => 'string|email|max:255|unique:users,email,'.$id.',id', // https://laravel.com/docs/5.2/validation#rule-unique , https://laracasts.com/discuss/channels/laravel/how-to-update-unique-email
      "avatar" => 'image|mimes:png,jpg,jpeg|max:2048|nullable',
    ];

    $mensajes = [
      "required" => "Completar campos obligatorios",
      "alpha" => "El campo nombre debe ser un texto",
      "name.min" => "El nombre debe tener un minimo de :min caracteres",
      "password.min" => "La clave debe tener un minimo de :min caracteres",
      "max" => "El nombre debe tener un maximo de :max caracteres",
      "confirmed" => "Las contraseñas no coinciden"

    ];

    $this->validate($request, $reglas,$mensajes);

    $user = User::find($id);
    $user->name = $request->name;
    $user->email = $request->email;
    $user->number = $request->number;



    if ($request->file("avatar")) { // si cambian una foto
      // obtenemos la ruta de la foto anterior
      $image_path = storage_path('app/public/') . $user->avatar;
      // verificamos si ya existe en la base de datos y en storage
      if ($user->avatar && file_exists($image_path)) {
        // elimina la foto de storage
        unlink($image_path);
      }

      // Si no poseía ninguna imagen directamente guardo la que estan subiendo
      $ruta = $request->file("avatar")->store("public"); // Esta ruta guarda al archivo con la ruta entera.
      $nombreDelArchivo = basename($ruta); // basename recorta la ruta y nos deja solo el nombre del archivo.
      $user->avatar = $nombreDelArchivo; // le asigna la nueva ruta a la base de datos
    }

    if ($request['new_password'])
    {
      $user->password = Hash::make($request['new_password']);
    }

    $user->is_admin = ($request['is_admin']) ?: 0;

    $user->save();

    return redirect('/')->with('success', 'Usuario actualizado exitosamente');

  }

  public function destroy(int $id)
  {

    $user = User::find($id);

    // Busco la imagen del asesor almacenada en storage
    $image_path = storage_path('app/public/') . $user->avatar;
    // verificamos si existe en la base de datos y en storage
    if ($user->avatar && file_exists($image_path)) {
      // elimina la imagen de storage
      unlink($image_path);
    }

    // elimino el profesional de la base de datos
    $asesor->delete();

    return redirect('/')
                    ->with('success', 'Usuario eliminado exitosamente');
  }

  public function deleteimage($id)
  {

    $user = User::find($id);

    // Busco la imagen del asesor almacenada en storage
    $image_path = storage_path('app/public/') . $user->avatar;
    // elimina la imagen de storage
    unlink($image_path);

    $user->avatar = null;

    $user->save();

    return redirect()->back()->with('status', 'Avatar Eliminada correctamente');

  }

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

    if ($request->monto <= $billetera->total - $billetera->invertido) {
      return back()->with('error', 'No puede invertir más dinero del que que posee en su billetera');

      $billetera = $user->billetera;
      $invertido = $request->monto;
      $proyecto_id = $request->proyecto_id;
      $user_id = $user->id;

    } else {

      $user->proyectos()->attach($id, array('invertido' => $invertido, 'proyecto_id' => $proyecto_id, 'user_id' => $user_id));
      $user->save();

      return back()->with('status', 'Inversión realizada correctamente');
    }
  }



}
