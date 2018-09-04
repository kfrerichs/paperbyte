<?php

namespace App\Http\Controllers;

use App\Models\Character;

class GroupController extends Controller
{
    public function getOverview(){

        return view('group.group');   
    }
    // public function getDetail(){
    //     return view('group.group_character');   
    // }
}