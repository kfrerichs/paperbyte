<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Protocol;

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
    /*public function index()
    {
        return view('home');
    }*/

    public function getProtocol(){
        $protocols = Protocol::orderBy('created_at','asc')->paginate(10);
        return view('home.protocol.index')->with('protocols', $protocols);


        //$user_id = auth()->user()->id;
        //$user = User::find($user_id);
        //return view('home.protocol.index')->with('protocols', $protocols);//->with('protocols', $user->protocols);
    }
}
