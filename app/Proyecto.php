<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{

  public $guarded = [];

  public function localidad()
  {
    return $this->belongsTo("App\Localidad", "localidad_id");
  }

  public function archivos()
  {
    return $this->hasMany("App\Archivo","proyecto_id");
  }

  public function actualizaciones()
  {
    return $this->hasMany("App\Actualizacion", "proyecto_id");
  }

  public function referentes()
  {
    return $this->hasMany("App")
  }

  public function usuarios()
  {
    return $this->belongsToMany("App\User", "usuarios_proyectos","proyecto_id", "user_id");
  }


}
