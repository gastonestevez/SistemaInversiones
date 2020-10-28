<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_de_referente extends Model
{

  public $guarded = [];

  public $table = 'tipo_de_referentes';

  public function referentes()
  {
    return $this->hasMany("App\Referente", "tipo_de_referente_id");
  }
}
