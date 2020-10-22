<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proyecto;
use App\Asesor;
use App\Archivo;
use App\Localidad;
use App\Referente;
use App\Tipo_de_referente;

class ProyectoController extends Controller
{

  public function new()
  {
    $localidades = Localidad::all();
    $asesores = Asesor::all();
    $tipo_de_referentes = Tipo_de_referente::all();
    return view('/addproyecto', compact('asesores','localidades', 'tipo_de_referentes'));
  }

  public function store(Request $request)
  {

    $reglas = [
      "titulo" => "required|unique:proyectos",
      "imagenes" => "nullable|array",
      "imagenes.*" => 'image|mimes:jpg,jpeg,png|max:2048',
      "documentos" => "nullable|array",
      "documentos.*" => 'nullable|mimes:pdf,docx,xlsx,txt,zip,rar,jpg,jpeg,png|max:10048',
      "logos" => "nullable|array",
      "logos.*" => 'nullable|image|mimes:png|max:2048',
      "asesor_id" => 'required',
    ];

    $mensajes = [
      "required" => "El campo :attribute es obligatorio ",
      "imagenes.*.image" => "Las imágenes deben ser de un formato de imagen",
      "imagenes.*.max" => 'La imagen supera los 2 MB',
      "imagenes.required" => "Sube una imagen",
      "imagenes.*.mimes" => "Las imágenes deben ser de tipo: .:values",
      "documentos.*.image" => "Debe ser en formato pdf",
      "documentos.*.max" => 'El pdf del plano supera los 10 MB',
      "documentos.required" => "Sube un plano",
      "documentos.*.mimes" => "Los documentos deben ser de tipo: .:values",
      "logos.*.image" => "Debe ser un formato de imagen",
      "logos.*.max" => 'La imagen supera los 2 MB',
      "logos.required" => "Sube una imagen",
      "logos.*.mimes" => "Los logos deben ser .:values"
    ];

    $this->validate($request, $reglas,$mensajes);

    $proyecto = New Proyecto();
    $proyecto->titulo = $request->titulo;
    $proyecto->slug = str_slug($request->titulo, "-");
    $proyecto->fecha = $request->fecha;
    $proyecto->link_web = $request->link_web;
    $proyecto->imagen_360 = $request->imagen_360;
    $proyecto->estados = $request->estados;
    $proyecto->porcentaje = $request->porcentaje;
    $proyecto->destacado = $request->destacado;
    $proyecto->localidad_id = $request->localidad_id;
    $proyecto->asesor_id = $request->asesor_id;

    $proyecto->save();

    //si suben una o mas imagenes, entonces comenzamos el proceso de guardado. obtengo el array de imagenes
    if ($request->imagenes)
    {
      $imagenes = $request->file('imagenes');
      // traigo las imagenes y recorro el array
      foreach ($imagenes as $imagen) {
          // guardo cada imagen en storage/public (no en la base de datos)
          $file = $imagen->store('public');
          // obtengo sus nombres
          $path = basename($file);

          // por cada imagen instancio un objeto de la clase archivo
          $archivo = new Archivo;
          // asigno las rutas correspondientes y asigno el id de la imagen que debe ser igual al id del ultimo data creado
          $archivo->proyecto_id = $proyecto->id;
          $archivo->imagen = $path;
          // obtengo el nombre del archivo y lo guardo https://stackoverflow.com/questions/37161505/laravel-get-name-of-file
          $archivo->nombre_documento = $imagen->getClientOriginalName();

          // guardo el objeto archivo instanciado en la base de datos
          $archivo->save();
      }
    }

    if ($request->logos)
    {
      $logos = $request->file('logos');
      // traigo las imagenes y recorro el array
      foreach ($logos as $logo) {
          // guardo cada imagen en storage/public (no en la base de datos)
          $file = $logo->store('public');
          // obtengo sus nombres
          $path = basename($file);

          // por cada imagen instancio un objeto de la clase archivo
          $archivo = new Archivo;
          // asigno las rutas correspondientes y asigno el id de la imagen que debe ser igual al id del ultimo data creado
          $archivo->proyecto_id = $proyecto->id;
          $archivo->logo = $path;
          // obtengo el nombre del archivo y lo guardo https://stackoverflow.com/questions/37161505/laravel-get-name-of-file
          $archivo->nombre_documento = $logo->getClientOriginalName();
          // guardo el objeto archivo instanciado en la base de datos
          $archivo->save();
      }
    }

      //si suben uno o mas documentos, entonces comenzamos el proceso de guardado. obtengo el array de logos
    if ($request->documentos)
    {

      $documentos = $request->file('documentos');
      // traigo los documentos y recorro el array
      foreach ($documentos as $documento) {
          // guardo cada plano en storage/public (no en la base de datos)
          $file = $documento->store('public');
          // obtengo sus nombres
          $path = basename($file);

          // por cada plano instancio un objeto de la clase archivo
          $archivo = new Archivo;
          // asigno las rutas correspondientes y asigno el id del logo que debe ser igual al id del ultimo evento creado
          $archivo->proyecto_id = $proyecto->id;
          $archivo->documento = $path;
          // obtengo el nombre del archivo y lo guardo https://stackoverflow.com/questions/37161505/laravel-get-name-of-file
          $archivo->nombre_documento = $documento->getClientOriginalName();

          // guardo el objeto archivo instanciado en la base de datos
          $archivo->save();
      }
    }


    foreach ($request->referente as $referente)
    {

      $nuevo_referente = New Referente;
      $nuevo_referente->nombre = $referente['nombre_referente'];
      if (isset($referente['foto_referente'])) {
        // guardo cada imagen en storage/public (no en la base de datos)
        $file = $referente['foto_referente']->store('public');
        // obtengo sus nombres
        $path = basename($file);
        $nuevo_referente->foto = $path;
      }
      $nuevo_referente->tipo_de_referente_id = $referente['tipo_de_referente'];

      // traigo el proyecto recien creado para obtener su ID
      $lastProject = Proyecto::all()->last();
      $projectId = $lastProject->id;
      $nuevo_referente->proyecto_id = $projectId;


      $nuevo_referente->save();
    }

    return redirect('/')->with('success', 'Proyecto creado exitosamente');

  }

}
