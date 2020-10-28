<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesor;
use App\Archivo;
use App\Proyecto;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      $asesores = Asesor::all();
      $users = User::all();
      $proyectos = Proyecto::all();
      $proyectosDestacados = Proyecto::where('destacado', '=', 1)->inRandomOrder()->get();

      // Si hay un usuario logueado veo que proyectos traer
      if (Auth::user()) {
        // Si es admin traigo todos los proyectos existentes
        if (isAdmin()) {
          $proyectos = Proyecto::all();
          // Si es un usuario regular traigo solamente los proyectos en los que invirtio
        } else {
          // Veo en que proyectos invirtio
          $proyectos = Auth::user()->proyectos;
          // Si invirtio creo un array para insertarlos dentro
          $proyectos = [];
          // Recorro cada proyecto en el que invirtio y lo coloco dentro del array proyectos
          foreach (Auth::user()->proyectos as $proyecto) {
            $proyectos[] = $proyecto;
          }
        }
      // Si no invirtio nunca, dejo el array vacio
      } else {
        $proyectos = [];
      }

      $vac = compact('asesores', 'users', 'proyectos', 'proyectosDestacados');

      return view('index', $vac);
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
