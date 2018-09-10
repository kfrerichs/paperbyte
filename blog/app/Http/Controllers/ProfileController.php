<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Hash;
use App\User;
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
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
 
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
 
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
 
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
 
        return redirect()->back()->with("success","Password changed successfully !");
 
    }

    public function getName()
    {
        return view('profile.change_name');
    }

    public function postName(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }

        $newName = $request->get('new-name');

        $user = User::where('name', Auth::user()->name)->first();
        $user->name = $newName;
        $user->save();

        $userInCharacter = Character::where('user', Auth::user()->name)->first();
        $userInCharacter->user = $newName;
        $userInCharacter->save();

    }
}
