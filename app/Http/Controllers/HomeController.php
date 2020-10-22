<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesor;
use App\Archivo;
use App\Proyecto;

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
      $proyectos = Proyecto::all();
      $vac = compact('asesores', 'proyectos');

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
