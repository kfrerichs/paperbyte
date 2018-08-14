<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Protocol extends Model
{
    //Table Name
    protected $table = 'protocols';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $timestamps = true;

    public function user(){
        return $this->belongsTo('App\User');
    }
}
