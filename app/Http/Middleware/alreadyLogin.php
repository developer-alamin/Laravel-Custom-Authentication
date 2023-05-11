<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class alreadyLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session()->has('logId') and (url('/') == $request->url())) {
            return back()->with('faild','Already Login Please logout');
        }elseif (Session()->has('logId') and (url('/users/usersLogin') == $request->url())){
            return back()->with('faild','Already Login Please logout');
        }elseif (Session()->has('logId') and (url('/users/register') == $request->url())) {
            return back()->with('faild','Already Registeration Please logout');
        }elseif (Session()->has('logId') and (url('/users/storeRegister') == $request->url())) {
            return back()->with('faild','Already Registeration Please logout');
        }
        return $next($request);
    }
}
