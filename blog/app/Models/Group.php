<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
  public static $rules = array('name' => 'required|min:3');

  public function user()
  {
      return $this->belongsToMany('App\User');
  }
}

?>