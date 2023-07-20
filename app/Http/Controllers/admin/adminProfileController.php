<?php

namespace App\Http\Controllers\admin;

use Session;
use App\Models\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminProfileController extends Controller
{
    function adminProfile(Request $request){
        if ($request->isMethod('post')) {
            return $request;
        }
        $data = array();
        if (Session::has('admin_id')) {
            $data = Admin::where('admin_id',Session::get('admin_id'))->first();
            return view('admin.profile',compact("data"));
        }
    }
}
