<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actualizacion extends Model
{

  public $guarded = [];
  public $table = 'actualizaciones';

  public function proyecto()
  {
    return $this->belongsTo("App\Proyecto", 'proyecto_id');
  }
}
