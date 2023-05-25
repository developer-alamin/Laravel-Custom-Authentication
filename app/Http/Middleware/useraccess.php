<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class useraccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!(Session()->has('admin_id')) and (url('/admin') == $request->url())) {
            return back()->with('faild','It Is For Admin');
        }else if(!(Session()->has('admin_id')) and (url('/admin/users') == $request->url())) {
            return back()->with('faild','It Is For Admin');
        }else if (!(Session()->has('admin_id')) and (url('/admin/getusers') == $request->url())) {
            return back()->with('faild','It Is For Admin');
        }elseif (!(Session()->has('admin_id')) and (url('/admin/verifyed') == $request->url())) {
            return back()->with('faild','It Is For Admin');
        }else if (!(Session()->has('admin_id')) and (url('/admin/getverifyed') == $request->url())) {
            return back()->with('faild','It Is For Admin');
        }else if (!(Session()->has('admin_id')) and (url('/admin/non-verifyed') == $request->url())) {
            return back()->with('faild','It Is For Admin');
        }else if (!(Session()->has('admin_id')) and (url('/admin/getnonverifyed') == $request->url())) {
            return back()->with('faild','It Is For Admin');
        }elseif(!(Session()->has('admin_id')) and (url('/admin/nonverifyDelete') == $request->url())){
            return back()->with('faild','It Is For Admin');
        }elseif (!(Session()->has('admin_id')) and (url('/admin/nonusersUpdateShow') == $request->url())) {
            return back()->with('faild','It Is For Admin');
        }elseif (!(Session()->has('admin_id')) and (url('/admin/nonUserUpdate') == $request->url())) {
            return back()->with('faild','It Is For Admin');
        }
        return $next($request);
    }
}
