<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
  public function character()
  {
      return $this->belongsTo('App\Models\Character');
  }

}

?>