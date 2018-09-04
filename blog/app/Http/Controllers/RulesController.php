<?php

namespace App\Http\Controllers;


class RulesController extends Controller
{
    public function getIndex(){
        return view('rules.midgard');   
    }
    public function getWeapons(){
        return view('rules.weapons');   
    }
    public function getRunes(){
        return view('rules.runes');   
    }
    public function getPotions(){
        return view('rules.potions');   
    }
    public function getCharacterfile(){
        return view('rules.character_file');   
    }
    public function getFailtable(){
        return view('rules.fail_table');   
    }
}