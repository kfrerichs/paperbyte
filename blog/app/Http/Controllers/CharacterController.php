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

    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }

    $character = Character::where('user', Auth::user()->name)->first();
    $jobs = Job::orderBy('name','asc')->get();
    $weapons = Weapon::orderBy('name','asc')->get();
    $armours = Armour::orderBy('id','asc')->get();
    return view('character.character_overview')->with('character', $character)->with('jobs', $jobs)->with('armours', $armours)->with('weapons', $weapons);
  }

  public function postOverview(){
    $character = Character::where('user', Auth::user()->name)->first();
    // $validator = Validator::make(Request::all(),array('name' => 'required|min:2'));
    
    //   if ($validator->fails()){
      //     return redirect('manufacturers/edit')->withErrors($validator)->withInput();
      //   }
      // $character = new Character();
    // $character->name= Request::input('name');

    if(Input::hasFile('file')){
      $file = Input::file('file');
      $userId = (string)Auth::user()->id;
      $picturename= $file->getClientOriginalName();
      $filename = $userId.$picturename;
      $file->move('images/character', $filename);
      $character->image = $filename;
    }

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
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }

    $character = Character::where('user', Auth::user()->name)->first();
    if($character == ''){
      return view('character.character_name');
    }
    else{
      return redirect('character');
    }

    
  }
  public function postName(){

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

  public function getNew($name=''){
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }
    $character = Character::where('user', Auth::user()->name)->first();
    $jobs = Job::orderBy('name','asc')->get();
    $weapons = Weapon::orderBy('name','asc')->get();
    $armours = Armour::orderBy('name','asc')->get();
    if($character == ''){
      return view('character.character_initialize')->with('character', $character)->with('jobs', $jobs)->with('armours', $armours)->with('weapons', $weapons);
    }
    else{
      return redirect('character');
    }
  }

  public function postNew(){
    $character = Character::where('user', Auth::user()->name)->first();
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
    $character->save();
    return redirect('/home');
  }
  
  public function getAbilities(){
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }
    $abilities = Ability::orderBy('name','asc')->get();
    $character = Character::where('user', Auth::user()->name)->first();
    $findJob = Job::where('id',$character->job_id)->first();
    // $findAbility = ::where('engl',)
    // $character->job_id
    $costs = $findJob->engl;
    return view('character.abilities')->with('abilities',$abilities)->with('costs',$costs)->with('character',$character);
  }
  public function postAbilities(){
    $abilities = Ability::orderBy('name','asc')->get();
    $character = Character::where('user', Auth::user()->name)->first();
    //$character->li_rank= Request::input('li_rank');
    foreach($abilities as $ability){
      $abilityname = $ability->engl;
      $character->$abilityname= Request::input($abilityname);
    }
    $character->save();
    return redirect('character/abilities');
  }
  public function getInventory(){
    if(Auth::user()->hasRole('master')) 
    {
      return redirect()->back();
    }
    $character = Character::where('user', Auth::user()->name)->first();
    $inventories = Inventory::where('character_id', $character->id)->get();
    $abilities = Ability::orderBy('name','asc')->get();
    return view('character.inventory')->with('character', $character)->with('inventories',$inventories)->with('abilities',$abilities);
  }
  public function postInventory(){
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
    $inventories = Inventory::find($id);
    if($inventories){
      $inventories->delete();
    }
    return redirect('character/inventory');
  }
}
