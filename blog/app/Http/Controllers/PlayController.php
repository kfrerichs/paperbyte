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
use Request;
use Validator;
use Auth;

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
    return view('play.play_player')->with('character', $character)->with('jobs', $jobs)->with('armours', $armours)->with('weapons', $weapons)->with('abilities',$abilities)->with('runes',$runes);
  }

  public function postPlay(){
    $character = Character::where('user', Auth::user()->name)->first();
    $character->mp = Request::input('mp');
    $character->hp = Request::input('hp');
    $character->save();
    return redirect('play');
    
  }

  public function getPlayMaster(){
    
    if(Auth::user()->hasRole('player')) 
    {
      return redirect()->back();
    }

    $character = Character::where('user', Auth::user()->name)->first();
    $jobs = Job::orderBy('name','asc')->get();
    $weapons = Weapon::orderBy('name','asc')->get();
    $armours = Armour::orderBy('name','asc')->get();
    $abilities = Ability::orderBy('name','asc')->get();
    $runes = Rune::orderBy('name','asc')->get();
    return view('play.play_master')->with('character', $character)->with('jobs', $jobs)->with('armours', $armours)->with('weapons', $weapons)->with('abilities',$abilities)->with('runes',$runes);
  }

  public function postPlayMaster(){
    $character = Character::where('user', Auth::user()->name)->first();
    $character->mp = Request::input('mp');
    $character->hp = Request::input('hp');
    $character->save();
    return redirect('play/master');
    
  }
 
}
