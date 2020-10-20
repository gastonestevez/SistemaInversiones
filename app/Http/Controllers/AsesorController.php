<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesor;

class AsesorController extends Controller
{

  public function new()
  {
    return view('/addasesor');
  }

  public function show(int $id)
  {
    $asesor = Asesor::find($id);
    $vac = compact('asesor');

    return view('/asesor');
  }

  public function store(Request $request)
  {

    $reglas = [
      "foto" => "mimes:jpg,jpeg,png|max:2048",
    ];

    $mensajes = [
      "mimes" => "Formato inválido",
      "foto.max" => 'La foto es muy pesada',
    ];

      $this->validate($request, $reglas, $mensajes);

      $asesor = new Asesor();
      $asesor->nombre = $request->nombre;
      $asesor->numero = $request->numero;
      $asesor->rentabilidad = $request->rentabilidad;

      if ($request->foto) {

        $foto = $request->file('foto');
        $file = $foto->store('public'); // Esta ruta guarda al archivo con la ruta entera.
        $path = basename($file); // basename recorta la ruta y nos deja solo el nombre del archivo.
        $asesor->foto = $path; // le asigna la nueva ruta a la base de datos
      } else {
        $asesor->foto = "archivos/img/avatarpredeterminado.svg"; // le asigna la nueva ruta a la base de datos
      }

      $asesor->save();

      return redirect('/')
            ->with('success', 'Asesor creado exitosamente');
  }

  public function edit(Int $id)
  {
    $asesor = Asesor::find($id);
    $vac = compact('asesor');

    return view('/editasesor', $vac);
  }

  public function update(Request $request, int $id)
  {

    $reglas = [
      "foto" => "mimes:jpg,jpeg,png|max:2048",
    ];

    $mensajes = [
      "mimes" => "Formato inválido",
      "foto.max" => 'La foto es muy pesada',
    ];

      $this->validate($request, $reglas, $mensajes);

      $asesor = Asesor::find($id);
      $asesor->nombre = $request->nombre;
      $asesor->numero = $request->numero;
      $asesor->rentabilidad = $request->rentabilidad;

      if ($request->foto) { // si cambian una foto
        // obtenemos la ruta de la foto anterior
        $image_path = storage_path('app/public/') . $asesor->foto;
        // verificamos si ya existe en la base de datos y en storage
        if ($asesor->foto && file_exists($image_path)) {
          // elimina la foto de storage
          unlink($image_path);
        }

        // Si no poseía ninguna imagen directamente guardo la que estan subiendo
        $ruta = $request->file("foto")->store("public"); // Esta ruta guarda al archivo con la ruta entera.
        $nombreDelArchivo = basename($ruta); // basename recorta la ruta y nos deja solo el nombre del archivo.
        $asesor->foto = $nombreDelArchivo; // le asigna la nueva ruta a la base de datos
      }

      $asesor->save();

      return redirect('/')
            ->with('success', 'Asesor editado exitosamente');
  }

  public function destroy(int $id)
  {

    $asesor = Asesor::find($id);

      // Busco la imagen del asesor almacenada en storage
      $imagen_path = storage_path('app/public/') . $asesor->foto;
      // Si esa imagen no es el avatar predeterminado la borro
      if(basename($imagen_path) != "avatarpredeterminado.svg") {
      // elimina la imagen de storage
      unlink($imagen_path);
      }

    // elimino el profesional de la base de datos
    $asesor->delete();

    return redirect('/')
                    ->with('success', 'Asesor eliminado exitosamente');
  }

  public function deleteimagen($id) {

    $asesor = Asesor::find($id);

    // Busco la imagen del asesor almacenada en storage
    $imagen_path = storage_path('app/public/') . $asesor->foto;
    // Si esa imagen no es el avatar predeterminado la borro
    if(basename($imagen_path) != "avatarpredeterminado.svg") {
      // elimina la imagen de storage
      unlink($imagen_path);
    } else {
      return back()->with('error', 'No puedes eliminar el avatar predeterminado, elige otra imagen para cambiarlo');
    }

    $asesor->foto = "archivos/img/avatarpredeterminado.svg"; // le asigna la nueva ruta a la base de datos

    $asesor->save();

    return back()->with('status', 'Foto Eliminada correctamente');

  }

}
