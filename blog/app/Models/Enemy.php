<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enemy extends Model
{
  public function job()
  {
      return $this->belongsTo('App\Models\Job');
  }
  public function weapon()
  {
      return $this->belongsTo('App\Models\Weapon');
  }
  public function armour()
  {
      return $this->belongsTo('App\Models\Armour');
  }
  public function place()
  {
      return $this->belongsTo('App\Models\Place');
  }
}

?>