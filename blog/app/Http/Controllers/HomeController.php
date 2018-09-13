<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Protocol;
use App\Adventure;
use Request;
use App\Models\Group;
use App\User;
use Input;
use Illuminate\Routing\Redirector;
use Session;
use Validator;
use Auth;
use App\Role;
use App\Models\Npc;
use App\Models\Place;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function getCreateGroup()
    {
        // *** check if user has already a group -> if he has redirect back
        $groupmember = Group::where('username', Auth::user()->name)->get();

        if($groupmember->count() > 0){
            return redirect()->back();
        }

        // *** custom error - if session has the value "new" handover the errormessage
        $errorMessageNew ='';
        $value = Session::get('error');

        if ($value == 'new')
        {
            $errorMessageNew = 'Die angegebene Gruppe existiert bereits!';
        }

        Session::put('error', '');
        return view('create_group')->with('errorMessageNew',$errorMessageNew);
    }

    public function getJoinGroup()
    {
        // *** check if user has already a group -> if he has redirect back
        $groupmember = Group::where('username', Auth::user()->name)->get();

        if($groupmember->count() > 0){
            return redirect()->back();
        }
        
        // *** custom error - if session has the value "join" handover the errormessage
        $errorMessageJoin ='';
        $value = Session::get('error');

        if ($value == 'join'){
            $errorMessageJoin = 'Die angegebene Gruppe existiert nicht!';
        }

        Session::put('error', '');
        return view('join_group')->with('errorMessageJoin',$errorMessageJoin);
    }

    public function postCreateGroupJoin()
    {   
        // *** check if the group exist
        $groupName = Request::input('name');
        $groupNameExist = Group::where('name','LIKE', '%'.$groupName.'%')->get();

        if(count($groupNameExist)>0)
        {
            // *** check if the validation rules are respected
            $validator = Validator::make(Request::all(), Group::$rules);

            if ($validator->fails())
            {
                return redirect('joingroup')->withErrors($validator)->withInput();
            }
            else
            {
                // *** attach the role player to the user
                $role_player = Role::where('name', 'player')->first();
                $user = User::where('name','LIKE','%'.Auth::user()->name.'%')->first();
                $user->roles()->attach($role_player);

                // *** enter the user to the group table
                $group = new Group();
                $group->name = $groupName;
                $group->username =  Auth::user()->name;
                $group->charactername = '';
                $group->role = 'player';
                $group->save();

                return redirect('character/name');
            }
        }
        else
        {
            // *** if the group name did not exist set the session value and redirect
            Session::put('error', 'join');
            return redirect()->back();
        }
    }

    public function postCreateGroupNew()
    {
        // *** check if the group did not exist
        $groupName = Request::input('name');
        $groupNameExist = Group::where('name','LIKE', '%'.$groupName.'%')->get();

        if(count($groupNameExist)<1)
        {
             // *** check if the validation rules are respected
            $validator = Validator::make(Request::all(), Group::$rules);

            if ($validator->fails())
            {
                return redirect('creategroup')->withErrors($validator)->withInput();
            }
            else
            {
                // *** attach the role player to the user
                $role_master = Role::where('name', 'master')->first();
                $user = User::where('name','LIKE','%'.Auth::user()->name.'%')->first();
                $user->roles()->attach($role_master);
                
                // *** enter the user to the group table
                $group = new Group();
                $group->name = $groupName;
                $group->username =  Auth::user()->name;
                $group->charactername = 'master';
                $group->role = 'master';
                $group->save();

                return redirect('home');
            }
        }
        else
        {
            // *** if the group name exist set the session value and redirect
            Session::put('error', 'new');
            return redirect()->back();
        }
    }
    
    public function getNpc(){
        // *** get all npcs and places and pass it to the view
        $npcs = Npc::all();
        $places = Place::all();
        return view('home.npcs')->with('npcs', $npcs)->with('places', $places);   
    }

    public function getPlaces(){
        // *** get all places and pass it to the view
        $places = Place::all();
        return view('home.places')->with('places', $places);   
    }
}