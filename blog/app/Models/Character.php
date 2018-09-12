<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    public static $rules = array('name' => 'required');

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
  public function inventory()
  {
      return $this->hasMany('App\Models\Inventory');
  }
  public function group()
  {
      return $this->belongsTo('App\Models\Group');
  }
}

?>