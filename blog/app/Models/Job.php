<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
  public function character()
  {
      return $this->hasMany('App\Models\Character');
  }
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