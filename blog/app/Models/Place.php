<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

<<<<<<< HEAD
class Place extends Model
=======
class Armour extends Model
>>>>>>> 7959e1fa7f1869a475e4a55a6dbaef2112cedf15
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