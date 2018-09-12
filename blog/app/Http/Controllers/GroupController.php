<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\Group;
use App\Models\Job;
use Auth;

class GroupController extends Controller
{
    public function getOverview(){
        $character = Character::where('user', Auth::user()->name)->first(); //Charakter des angemeldeten Users
        $group = Group::where('charactername', $character->name)->first(); // Name der Gruppe in der der Charakter sich befindet
        $members = Group::where('name',$group->name)->get();
        $allCharacters = Character::all();
        return view('group.group')->with('members', $members)->with('allCharacters', $allCharacters)->with('character', $character);
    }
    public function getDetail($id=null){
        $character = Character::find($id);
        $job = Job::find($id);
        return view('group.group_character')->with('character', $character)->with('job', $job);   
    }
}