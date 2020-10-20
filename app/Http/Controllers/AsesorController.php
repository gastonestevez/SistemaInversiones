<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asesor;

class AsesorController extends Controller
{

  public function new()
  {
    return view('/addasesor');
  }

}
