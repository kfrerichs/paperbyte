<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Group;
use App\Models\Job;
use App\Models\Armour;
use App\Models\Weapon;
use App\Models\Ability;
use App\Models\Inventory;
use Request;
use Validator;
use Auth;
use Illuminate\Support\Facades\Input;

class CharacterController extends Controller
{
  public function getOverview(){
    // fallback -> master doens't have a character so he cant't open this page
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }
    // *** get character data from logged in user, the job db, the weapon db and armour db.
    // *** return view with variables/arrays
    $character = Character::where('user', Auth::user()->name)->first();
    $jobs = Job::orderBy('name','asc')->get();
    $weapons = Weapon::orderBy('name','asc')->get();
    $armours = Armour::orderBy('id','asc')->get();
    return view('character.character_overview')->with('character', $character)->with('jobs', $jobs)->with('armours', $armours)->with('weapons', $weapons);
  }

  public function postOverview(){
    // *** get character data of logged in user
    $character = Character::where('user', Auth::user()->name)->first();

    // *** save uploaded image to database with userid so images with the same name don't get overwritten
    if(Input::hasFile('file')){
      $file = Input::file('file');
      $userId = (string)Auth::user()->id;
      $picturename= $file->getClientOriginalName();
      $filename = $userId.$picturename;
      $file->move('images/character', $filename);
      $character->image = $filename;
    }
    // *** save input data to database
    $character->gender= Request::input('gender');
    $character->job_id= Request::input('job_id');
    $character->age= Request::input('age');
    $character->hair= Request::input('hair');
    $character->eyes= Request::input('eyes');
    $character->size= Request::input('size');
    $character->weight= Request::input('weight');
    $character->family= Request::input('family');
    $character->looks= Request::input('looks');
    $character->personality= Request::input('personality');
    $character->background= Request::input('background');
    $character->weapon_1_id= Request::input('weapon_1_id');
    $character->weapon_2_id= Request::input('weapon_2_id');
    $character->armour_id= Request::input('armour_id');
    $character->li_rank= Request::input('li_rank');
    $character->li= Request::input('li');
    $character->st_rank= Request::input('st_rank');
    $character->st= Request::input('st');
    $character->in_rank= Request::input('in_rank');
    $character->in= Request::input('in');
    $character->re_rank= Request::input('re_rank');
    $character->re= Request::input('re');
    $character->ge_rank= Request::input('ge_rank');
    $character->ge= Request::input('ge');
    $character->lo_rank= Request::input('lo_rank');
    $character->lo= Request::input('lo');
    $character->sd_rank= Request::input('sd_rank');
    $character->sd= Request::input('sd');
    $character->ch_rank= Request::input('ch_rank');
    $character->ch= Request::input('ch');

    // *** calculate and set max_mp and max_hp through attribute-values. (10 x rand(1,10) to imitate 10 throws of tensided dice )
    // *** at initialising a character the current mp and hp are the same as max
    // *** to prevent changing of max-values through random numbers it is only set when the character values are 0 -> i.e. initialised character
    $st= $character->st_rank;
    $sd= $character->sd_rank;
    $ge= $character->ge_rank;
    if($character->max_hp == 0 && $character->max_mp == 0){
      $character->max_hp= (2*$sd)+(2*$st)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10);
      $character->max_mp= (2*$ge)+(2*$sd)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10)+rand(1,10);
      $character->mp= $character->max_mp;
      $character->hp= $character->max_hp;
    }
    $character->save();
    return redirect('character');
    
  }
  public function getName(){
    // *** fallback -> master doesn't get a character
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }
    // only open if the user doesn't have a character yet. Otherwise redirect to character page
    $character = Character::where('user', Auth::user()->name)->first();
    if($character == ''){
      return view('character.character_name');
    }
    else{
      return redirect('character');
    }
    
    
  }
  public function postName(){
    // *** to get a character the name must be unique. if the name of the character is unique the user gets redirected to character overview page to save his data.
    // *** the charactername gets also written into group db

    $validator = Validator::make(Request::all(), Group::$rules);

    if ($validator->fails())
    {
        return redirect('character/name')->withErrors($validator)->withInput();
    }

    $characterWithSameName = Character::where('name', Request::input('name'))->get();
    $errorMessage = "Name ist bereits vergeben";
    if($characterWithSameName->count() > 0)
    {
      return redirect('character/name')->withError($errorMessage);
    }
    
    $character = new Character;
    $character->user = Auth::user()->name;
    $character->name = Request::input('name');
    $character->save();
    $group = Group::where('username', Auth::user()->name)->where('charactername','=', '')->first();
    $group->charactername = Request::input('name');
    $group->save();
    return redirect('character');
  }
  
  public function getAbilities(){
    // *** fallback -> master doesn't have a character
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }
    // *** get abilities, character data of logged in user and the job of the character to show specific costs for abilities
    $abilities = Ability::orderBy('name','asc')->get();
    $character = Character::where('user', Auth::user()->name)->first();

    if($character->job_id == null)
    {
      $findJob = Job::where('id','1')->first();
    }
    else
    {
      $findJob = Job::where('id',$character->job_id)->first();
    }
    $costs = $findJob->engl;
    return view('character.abilities')->with('abilities',$abilities)->with('costs',$costs)->with('character',$character);
  }
  public function postAbilities(){
    // *** save input data to character for every ability
    $abilities = Ability::orderBy('name','asc')->get();
    $character = Character::where('user', Auth::user()->name)->first();
    foreach($abilities as $ability){
      $abilityname = $ability->engl;
      $character->$abilityname= Request::input($abilityname);
    }
    $character->save();
    return redirect('character/abilities');
  }
  public function getInventory(){
    // *** fallback -> master doesn't have a character
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }
    // *** get inventory of the character and abilities to add modulo
    $character = Character::where('user', Auth::user()->name)->first();
    $inventories = Inventory::where('character_id', $character->id)->get();
    $abilities = Ability::orderBy('name','asc')->get();
    return view('character.inventory')->with('character', $character)->with('inventories',$inventories)->with('abilities',$abilities);
  }
  public function postInventory(){
    // *** save new item
    $character = Character::where('user', Auth::user()->name)->first();
    $inventory = new Inventory();
    $inventory->character_id= $character->id;
    $inventory->item_name= Request::input('item_name');
    $inventory->description= Request::input('description');
    $inventory->modulo= Request::input('modulo');
    $inventory->ability_id= Request::input('ability_id');
    $inventory->save();
    return redirect('character/inventory'); 
  }
  public function getDelete($id = null){
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }
    // *** delete item
    $inventories = Inventory::find($id);
    if($inventories){
      $inventories->delete();
    }
    return redirect('character/inventory');
  }
}
