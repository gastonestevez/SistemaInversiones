<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Archivo;

class ArchivosController extends Controller
{

  public function deleteimage(Request $request, int $id)
  {

    // Selecciono el id del archivo donde se encuentra la imagen
      $archivo = Archivo::where('id', "=", $id)->get();
      // elimino la imagen de storage
      unlink(storage_path('app/public/').$archivo->first()->imagen);
      // borramos el archivo
      $archivo->first()->delete();

      // nos retorna a la ruta anterior
      return redirect()->back()->with('status', 'Imagen eliminada exitosamente');
  }

  public function deletelogo(Request $request, int $id)
  {

    // Selecciono el id del archivo donde se encuentra el logo
      $archivo = Archivo::where('id', "=", $id)->get();
      // elimino el logo de storage
      unlink(storage_path('app/public/').$archivo->first()->logo);
      // borramos el archivo
      $archivo->first()->delete();

      // nos retorna a la ruta anterior
      return redirect()->back()->with('status', 'Logo eliminado exitosamente');
  }

  public function deletedocumento(Request $request, int $id)
  {

    // Selecciono el id del archivo donde se encuentra el documento
      $archivo = Archivo::where('id', "=", $id)->get();
      // elimino el logo de storage
      unlink(storage_path('app/public/').$archivo->first()->documento);
      // borramos el archivo
      $archivo->first()->delete();

      // nos retorna a la ruta anterior
      return redirect()->back()->with('status', 'Documento eliminado exitosamente');
  }

}
