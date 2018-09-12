<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Job;
use App\Models\Armour;
use App\Models\Weapon;
use App\Models\Ability;
use App\Models\Inventory;
use App\Models\Rune;
use App\Models\Role_User;
use App\Models\Enemy;
use Request;
use Validator;
use Auth;
use Session;

class PlayController extends Controller
{
  public function getPlay(){
    //only Player
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }
    
    $character = Character::where('user', Auth::user()->name)->first();
    $jobs = Job::orderBy('name','asc')->get();
    $weapons = Weapon::orderBy('name','asc')->get();
    $armours = Armour::orderBy('name','asc')->get();
    $abilities = Ability::orderBy('name','asc')->get();
    $runes = Rune::orderBy('name','asc')->get();
    $inventories = Inventory::where('character_id',$character->id)->get();
    return view('play.play_player')->with('character', $character)->with('jobs', $jobs)->with('armours', $armours)->with('weapons', $weapons)->with('abilities',$abilities)->with('runes',$runes)->with('inventories',$inventories);
  }

  public function postPlay(){
    $character = Character::where('user', Auth::user()->name)->first();
    $character->mp = Request::input('mp');
    $character->hp = Request::input('hp');
    $character->save();
    return redirect('play');
    
  }

  public function getPlayMaster(){
    //only Master
    if(Auth::user()->hasRole('player')) 
    {
      return redirect()->back();
    }
    // $character = Character::where('user', Auth::user()->name)->first();
    // $jobs = Job::orderBy('name','asc')->get();
    // $weapons = Weapon::orderBy('name','asc')->get();
    // $armours = Armour::orderBy('name','asc')->get();
    $abilities = Ability::orderBy('name','asc')->get();
    $runes = Rune::orderBy('name','asc')->get();
    $enemies = Enemy::orderBy('name','asc')->get();
    $enemyID = Session::get('idEnemy');
    if($enemyID){
      $chosenEnemy = Enemy::where('id',$enemyID)->first();
    }
    else{
      $chosenEnemy = Enemy::where('id',1)->first();
      Session::put('idEnemy',1);
    }
    return view('play.play_master')->with('enemies', $enemies)->with('chosenEnemy',$chosenEnemy)->with('abilities',$abilities)->with('runes',$runes);
  }
  public function postPlayMaster(){
    $getEnemy = Request::input('chooseEnemy');
    Session::put('idEnemy',$getEnemy);
    return redirect('play/master');
    
  }
  public function postPlayMasterPoints(){
    $enemyID = Session::get('idEnemy');
    $chosenEnemy = Enemy::where('id',$enemyID)->first();
    // var_dump($enemyID);
    // var_dump($chosenEnemy);
    // return;
    $chosenEnemy->mp = Request::input('mp');
    $chosenEnemy->hp = Request::input('hp');
    $chosenEnemy->save();
    return redirect('play/master');

  }

 
}
