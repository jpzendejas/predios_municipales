<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PropiertyImage extends Model
{
  public function propierty(){
    return $this->belongsTo('App\Propierty');
  }
}
