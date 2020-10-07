<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
  public $guarded = [];
  
  public function proyecto()
  {
    return $this->belongsTo("App\Proyecto", "proyecto_id");
  }
}
