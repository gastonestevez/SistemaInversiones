<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
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
      dd($proyecto->archivos);

      return  view('/proyecto', $vac);
    }

    public function editarperfil(int $id)
    {
      $user = User::find($id);
      $vac = compact('user');

      return view('/perfil', $vac);
    }

    public function updateperfil(Request $request, int $id)
    {

      $reglas = [
        'name' =>'alpha|required|string|min:2|max:40|',
        'email' => 'required|string|email|max:255|unique:users,email,'.$id.',id', // https://laravel.com/docs/5.2/validation#rule-unique , https://laracasts.com/discuss/channels/laravel/how-to-update-unique-email
        'password' => 'nullable|min:6|confirmed',
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

      if ($request['password'])
      {
        $user->password = Hash::make($request['password']);
      }

      $user->is_admin = ($request->admin) ? $request->admin : 0;

      $user->save();

      return redirect('/prueba')
            ->with('status', 'Usuario actualizado exitosamente');

    }

}
