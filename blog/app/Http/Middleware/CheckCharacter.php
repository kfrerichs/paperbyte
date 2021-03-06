<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Group;
use Auth;

class CheckCharacter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $characterInGroup = Group::where('username', Auth::user()->name)->first();
    
        if($characterInGroup->charactername == '')
        {
        return redirect('/character/name');
        }

        return $next($request);
    }
}
