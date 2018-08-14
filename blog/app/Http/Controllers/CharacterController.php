<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Job;
use App\Models\Armour;
use App\Models\Weapon;
use App\Models\Ability;
use Request;
use Validator;

class CharacterController extends Controller
{
  public function getOverview(){
    $character = Character::where('user', 'Klara')->first();
    $jobs = Job::orderBy('name','asc')->get();
    $weapons = Weapon::orderBy('name','asc')->get();
    $armours = Armour::orderBy('name','asc')->get();
    $test= "alalalaala";
    return view('character.character_overview')->with('character', $character)->with('test',$test)->with('jobs', $jobs)->with('armours', $armours)->with('weapons', $weapons);
  }
  public function postOverview(){
    $character = Character::where('user', 'Klara')->first();
    // $validator = Validator::make(Request::all(),array('name' => 'required|min:2'));
    
    //   if ($validator->fails()){
      //     return redirect('manufacturers/edit')->withErrors($validator)->withInput();
      //   }
      // $character = new Character();
    // $character->name= Request::input('name');
    $character->gender= Request::input('gender');
    $character->job_id= Request::input('job_id');
    $character->age= Request::input('age');
    $character->hair= Request::input('hair');
    $character->eyes= Request::input('eyes');
    $character->size= Request::input('size');
    $character->weight= Request::input('weight');
    $character->family= Request::input('family');
    $character->looks= Request::input('looks');
    $character->background= Request::input('background');
    $character->weapon_1_id= Request::input('weapon_1_id');
    $character->weapon_2_id= Request::input('weapon_2_id');
    $character->armour_id= Request::input('armour_id');
    $character->li_rank= Request::input('li_rank');
    $character->li= Request::input('li');
    // $character->st= Request::input('st');
    $character->in= Request::input('in');
    // $character->re= Request::input('re');
    // $character->ge= Request::input('ge');
    $character->lo= Request::input('lo');
    // $character->sd= Request::input('sd');
    // $character->ch= Request::input('ch');
    $character->save();
    return redirect('character');
    
  }
  public function getNew($name=''){
    //wenn keine Character-Zeile den Namen des Users hat und(!) der aktuellen Gruppe zugeordnet ist dann zeige seite /new
    
    //prüfe value von Text-input (name des Charakters) und ob es diesen schon in der CharakterDB gibt
    //wenn ja: ERROR: Name schon vergeben
    //wenn nein: erstelle neuen Charakter mit dem Namen, User und Gruppe. Leite an /character weiter
  }
  
  public function getAbilities(){
    $abilities = Ability::orderBy('name','asc')->get();
    $character = Character::where('user', 'Klara')->first();
    $findJob = Job::where('id',$character->job_id)->first();
    // $findAbility = ::where('engl',)
    // $character->job_id
    $costs = $findJob->engl;
    return view('character.abilities')->with('abilities',$abilities)->with('costs',$costs)->with('character',$character);
  }
  public function postAbilities(){
    $abilities = Ability::orderBy('name','asc')->get();
    $character = Character::where('user', 'Klara')->first();
    //$character->li_rank= Request::input('li_rank');
    foreach($abilities as $ability){
      $abilityname = $ability->engl;
      $character->$abilityname= Request::input($abilityname);
    }
    $character->save();
    return redirect('character/abilities');
  }
  
}
