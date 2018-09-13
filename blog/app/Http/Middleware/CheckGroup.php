<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Models\Group;

class CheckGroup
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
        $userInGroup = Group::where('username', Auth::user()->name)->first();
        if($userInGroup == null)
        {
            return redirect('joingroup');
        }
        
        return $next($request);
    }
}
