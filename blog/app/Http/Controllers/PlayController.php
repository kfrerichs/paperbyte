<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Job;
use App\Models\Armour;
use App\Models\Weapon;
use App\Models\Ability;
use App\Models\Inventory;
use Request;
use Validator;

class PlayController extends Controller
{
  public function getPlay(){
    $character = Character::where('user', 'Klara')->first();
    $jobs = Job::orderBy('name','asc')->get();
    $weapons = Weapon::orderBy('name','asc')->get();
    $armours = Armour::orderBy('name','asc')->get();
    $abilities = Ability::orderBy('name','asc')->get();
    return view('play.play_player')->with('character', $character)->with('jobs', $jobs)->with('armours', $armours)->with('weapons', $weapons)->with('abilities',$abilities);
  }
  public function postPlay(){
    $character = Character::where('user', 'Klara')->first();

    return redirect('play');
    
  }
 
}
