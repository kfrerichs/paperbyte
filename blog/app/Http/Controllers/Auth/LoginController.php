<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Cookie;
use App\Models\Group;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        //doofe stelle -.-

        if(Cookie::get('group') != null && Cookie::get('group') == null)
        {
            $groupEntry = Group::where('name','LIKE', '%'.Cookie::get('group').'%')->get();
            Cookie::queue('character', $groupEntry[0]->character, 43200);
        }
        else if (Cookie::get('group') == null)
        {
            $groupEntry = Group::where('username','LIKE', '%'.Auth::user()->name.'%')->get();

            Cookie::queue('group', $groupEntry[0]->name, 43200);
            Cookie::queue('character', $groupEntry[0]->charactername, 43200);
        }

        return '/home';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'name';
    }
}
