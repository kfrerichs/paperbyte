<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Hash;
use App\User;
use App\Models\Group;
use App\Models\Character;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getPass(){
        return view('profile.change_pass');
    }

    public function postPass(Request $request){
 
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Deine eingegebenen Passwörter stimmen nicht überein.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","Dein neues Passwort kann nicht dein bisheriges Passwort sein. Versuche ein anderes.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Passwort erfolgreich geändert!");
 
    }

    public function getName()
    {
        return view('profile.change_name');
    }

    public function postName(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Das Passwort ist falsch.");
        }

        $newName = $request->get('new-name');

        $user = User::where('name', Auth::user()->name)->first();
        $user->name = $newName;
        $user->save();

        $userInCharacter = Character::where('user', Auth::user()->name)->first();
        if($userInCharacter)
        {
            $userInCharacter->user = $newName;
            $userInCharacter->save();
        }

        $userInGroup = Group::where('username', Auth::user()->name)->first();
        if($userInCharacter)
        {
            $userInGroup->username = $newName;
            $userInGroup->save();
        }

        return redirect()->back()->with("success","Name erfolgreich geändert!");
    }
}
