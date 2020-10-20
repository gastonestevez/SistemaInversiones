<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesor;
use App\Archivo;

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
      $vac = compact('asesores');

      return view('/home', $vac);
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
}
