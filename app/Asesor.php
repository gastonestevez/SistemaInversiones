<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asesor extends Model
{
  public $guarded = [];
  public $table = 'asesores';

  public function proyectos()
  {
    return $this->hasMany("App\Proyecto", "asesor_id");
  }
}
