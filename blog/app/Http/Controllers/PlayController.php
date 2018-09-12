<?php

namespace App\Http\Controllers;

use App\Models\Character;
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
    // *** only Player
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }
    // *** get character data from logged in user, the ability db, the runes db and inventory-items of the chosen character.
    // *** return view with variables/arrays
    $character = Character::where('user', Auth::user()->name)->first();
    $abilities = Ability::orderBy('name','asc')->get();
    $runes = Rune::orderBy('name','asc')->get();
    $inventories = Inventory::where('character_id',$character->id)->get();
    return view('play.play_player')->with('character', $character)->with('abilities',$abilities)->with('runes',$runes)->with('inventories',$inventories);
  }

  public function postPlay(){
    // *** save changed hp and mp to character of logged in user. Then redirect to page /play
    $character = Character::where('user', Auth::user()->name)->first();
    $character->mp = Request::input('mp');
    $character->hp = Request::input('hp');
    $character->save();
    return redirect('play');
    
  }

  public function getPlayMaster(){
    // *** only Master
    
    if(Auth::user()->hasRole('player')) 
    {
      return redirect()->back();
    }
    // *** get the enemies db, the ability db and the runes db.
    $abilities = Ability::orderBy('name','asc')->get();
    $runes = Rune::orderBy('name','asc')->get();
    $enemies = Enemy::orderBy('name','asc')->get();
    // *** get the chosen enemy through his id saved in a cookie, if no cookie is saved
    // *** just take the first saved enemy;
    $enemyID = Session::get('idEnemy');
    if($enemyID){
      $chosenEnemy = Enemy::where('id',$enemyID)->first();
    }
    else{
      $chosenEnemy = Enemy::where('id',1)->first();
      Session::put('idEnemy',1);
    }
    // *** return view with variables/arrays
    return view('play.play_master')->with('enemies', $enemies)->with('chosenEnemy',$chosenEnemy)->with('abilities',$abilities)->with('runes',$runes);
  }

  public function postPlayMaster(){
    // *** get the ID of chosen enemy from selectbox and save it to a cookie, then redirect.
    $getEnemy = Request::input('chooseEnemy');
    Session::put('idEnemy',$getEnemy);
    return redirect('play/master');
    
  }
  public function postPlayMasterPoints(){
    // *** get the ID of chosen enemy through saved cookie and save changed mp and hp to his database, then redirect
    $enemyID = Session::get('idEnemy');
    $chosenEnemy = Enemy::where('id',$enemyID)->first();
    $chosenEnemy->mp = Request::input('mp');
    $chosenEnemy->hp = Request::input('hp');
    $chosenEnemy->save();
    return redirect('play/master');

  }

 
}
