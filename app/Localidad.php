<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{

  public $guarded = [];
  public $table = 'localidades';

  public function proyectos()
  {
    return $this->hasMany("App\Proyecto", "localidad_id");
  }
}
