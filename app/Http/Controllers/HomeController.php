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
      $users = User::orderBy('name')->get();
      $proyectos = Proyecto::all();
      $proyectosDestacados = Proyecto::where('destacado', '=', 1)->inRandomOrder()->get();
      // Si no hay ni un proyecto destacado pero hay proyectos comunes, mostramos los proyectos comunes
      if (!count($proyectosDestacados) && count($proyectos)) {
        $proyectosDestacados = Proyecto::all()->random()->limit(5)->get();
      }

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

}
