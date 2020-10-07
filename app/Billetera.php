<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billetera extends Model
{

  public $guarded = [];
  public $table = 'billeteras';

  public function usuario()
  {
    return $this->hasOne("App\User")
  }
}
