<?php

namespace App\Http\Controllers;

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
use Cookie;
use App\Role;

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
    
    public function index()
    {
        // public function index(Request $request)
        // {
        //     $request->user()->authorizeRoles(['employee', 'manager']);
        // @if(Auth::user()->hasRole(‘manager’)) 

       // $cookieGroup = request()->cookie('group');
        // $cookieCharacter = request()->cookie('character');
        return view('home')->with('cookieGroup',$cookieGroup)->with('cookieCharacter', $cookieCharacter);
    }

    public function getProtocol(){
        $protocols = Protocol::orderBy('created_at','asc')->paginate(10);
        return view('home.protocol.index')->with('protocols', $protocols);
    }

    public function getAdventure(){
        $adventures = Adventure::orderBy('created_at','asc')->paginate(10);
        return view('home.adventure.index')->with('adventures', $adventures);

        //$user_id = auth()->user()->id;
        //$user = User::find($user_id);
        //return view('home.protocol.index')->with('protocols', $protocols);//->with('protocols', $user->protocols);
        
    }


    public function getCreateGroup()
    {
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
        $errorMessageJoin ='';
        $value = Session::get('error');

        if ($value == 'join'){
            $errorMessageJoin = 'Die angegebene Gruppe existiert nicht!';
        }

        Session::put('error', '');
        return view('join_group')->with('errorMessageJoin',$errorMessageJoin);
    }

    public function postCreateGroupJoin(Request $request)
    {
        $groupName = Request::input('name');
        $groupNameExist = Group::where('name','LIKE', '%'.$groupName.'%')->get();

        if(count($groupNameExist)>0)
        {
            $validator = Validator::make(Request::all(), Group::$rules);

            if ($validator->fails())
            {
                return redirect('creategroup')->withErrors($validator)->withInput();
            }
            else
            {
                $role_player = Role::where('name', 'player')->first();
                $user = User::where('name','LIKE','%'.Auth::user()->name.'%')->first();
                $user->roles()->attach($role_player);

                $group = new Group();
                $group->name = $groupName;
                $group->username =  Auth::user()->name;
                $group->charactername = '';
                $group->role = 'player';
                $group->save();

                Cookie::queue('group', $groupName, 43200);

                return redirect('home');
                // return view('character');
            }
        }
        else
        {
            Session::put('error', 'join');
            return redirect()->back();
        }
    }

    public function postCreateGroupNew(Request $request)
    {
        $groupName = Request::input('name');
        $groupNameExist = Group::where('name','LIKE', '%'.$groupName.'%')->get();

        if(count($groupNameExist)<1)
        {
            $validator = Validator::make(Request::all(), Group::$rules);

            if ($validator->fails())
            {
                return redirect('creategroup')->withErrors($validator)->withInput();
            }
            else
            {
                $role_master = Role::where('name', 'master')->first();
                $user = User::where('name','LIKE','%'.Auth::user()->name.'%')->first();
                $user->roles()->attach($role_master);
                
                $group = new Group();
                $group->name = $groupName;
                $group->username =  Auth::user()->name;
                $group->charactername = 'master';
                $group->role = 'master';
                $group->save();

                Cookie::queue('group', $groupName, 43200);

                return redirect('home');
                // return view('character');
                echo "There is data".$groupName['newName'];
            }
        }
        else
        {
            Session::put('error', 'new');
            return redirect()->back();
        }
    }
}
