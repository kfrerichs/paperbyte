<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Request;
use Validator;

class CharacterController extends Controller
{
    public function getOverview(){
    	return view('character.character_overview');
    }
}
