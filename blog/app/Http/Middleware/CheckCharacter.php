<?php

namespace App\Http\Middleware;

use Closure;

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
        // Das war unser Ansatz, aber er kennt use App/Models/Group nicht
        // $group = Group::where('username', Auth::user()->name)('charactername','=', '')->first();

        if ($request->$group != null) {
            return redirect('home');
        }

        return $next($request);
    }
}
