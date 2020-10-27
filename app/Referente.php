<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referente extends Model
{

  public $guarded = [];

  public function proyecto()
  {
    return $this->belongsTo("App\Proyecto", "proyecto_id");
  }

  public function tipoDeReferente()
  {
    return $this->belongsTo("App\"tipo_de_referente", "tipo_de_referente_id");
  }
}
