<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armour extends Model
{
  public function character()
  {
      return $this->hasMany('App\Models\Character');
  }
  public function enemy()
  {
      return $this->hasMany('App\Models\Enemy');
  }

}

?>