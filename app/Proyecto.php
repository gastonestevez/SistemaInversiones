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
    return $this->hasMany("App\Referente");
  }

  public function usuarios()
  {
    // https://styde.net/pivot-tables-con-eloquent-en-laravel/ para agregar pivots
    return $this->belongsToMany("App\User", "proyecto_usuario", "proyecto_id", "user_id")
    ->withPivot('invertido')
    ->as('inversiones')
    ->withTimestamps();
  }

  public function asesor()
  {
    return $this->belongsTo("App\Asesor", "asesor_id");
  }


}
