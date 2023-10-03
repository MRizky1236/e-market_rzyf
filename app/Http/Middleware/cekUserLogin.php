<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class cekUserLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class CekUserLogin
{
    public function handle(Request $request, Closure $next, $rules)
    {
        $user = Auth::user();

        if (!Auth::check()) {
            return redirect('login');
        }

        if ($user->level == $rules) {
            return $next($request);
        }

        return redirect('login')->with('error', 'You have no privilege');
    }
}
    }
}