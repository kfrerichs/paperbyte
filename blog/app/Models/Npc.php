<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Npc extends Model
{  
  public function job()
  {
      return $this->belongsTo('App\Models\Job');
  }
  public function place()
  {
      return $this->belongsTo('App\Models\Place');
  }
  
}

?>