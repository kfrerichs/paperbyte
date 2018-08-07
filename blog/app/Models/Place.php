<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Armour extends Model
{
  public function npc()
  {
      return $this->hasMany('App\Models\Npc');
  }
  public function enemy()
  {
      return $this->hasMany('App\Models\Enemy');
  }
}

?>