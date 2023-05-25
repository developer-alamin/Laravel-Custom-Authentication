<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class adminAlreadyLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session()->has('admin_id') or !(Session()->has('admin_id')) and (url('/users/profile') == $request->url())) {
            return back()->with('faild','It Is For Users Not Admin Allow');
        }elseif(Session()->has('admin_id') or !(Session()->has('admin_id')) and (url('/users/updateShow') == $request->url())) {
            return back()->with('faild','It Is For Users Not Admin Allow');
        }elseif (Session()->has('admin_id') or !(Session()->has('admin_id')) and (url('/users/updateShow') == $request->url())) {
            return back()->with('faild','It Is For Users Not Admin Allow');
        }elseif (Session()->has('admin_id') or !(Session()->has('admin_id')) and (url('verify/{token}') == $request->url())) {
            return back()->with('faild','It Is For Users Not Admin Allow');
        }elseif (Session()->has('admin_id') and (url('/users/logout') == $request->url())) {
            return back()->with('faild','It Is For Users Not Admin Allow');
        }
        return $next($request);
    }
}
