<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Auth;

class GroupController extends Controller
{
    public function getOverview(){
        $character = Character::where('user', Auth::user()->name)->first(); //Charakter des angemeldeten Users
        $group = Group::where('charactername', $character->name)->first(); // Name der Gruppe in der der Charakter sich befindet
        $members = Group::where('name',$group->name);
        $allCharacters = Character::all();
        return view('group.group')->with('members', $members)->with('allCharacters', $allCharacters);
    }
    // public function getDetail(){
    //     return view('group.group_character');   
    // }
}