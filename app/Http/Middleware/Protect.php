<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class Protect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if ($previousUrl = Session::get('previous_url')) {
            Session::forget('previous_url');
            return redirect()->to($previousUrl);
        }
    
        $user = Auth::user();
    
        if (!Auth::check()) {
            Session::put('previous_url', url()->current());
        }
    
        if ($user && in_array($user->role, $roles)) {
            return $next($request);
        }
    
        return redirect()->back()->with('error', 'Akses ke halaman dibatasi.');
    }
}
