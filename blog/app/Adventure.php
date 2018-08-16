<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    //Table Name
    protected $table = 'adventures';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
