<?php

namespace App\Http\Controllers;
use Hash;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Mail\updateMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Type\TrueType;
use Illuminate\Support\Facades\Storage;

class adminLoginController extends Controller
{
    // admin register functionally code start form here
    public function register()
    {
        return view('auth.register');
    }
    // admin register functionally code start form here
    public function adminstoreRegister(Request $req)
    {
       $req->validate([
        'admin_mobile' => 'unique:admins_table',
        'admin_id' => 'unique:admins_table',
        'admin_email' => 'unique:admins_table',
        'admin_img' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:1024'
       ]);

        $http = $_SERVER['HTTP_HOST'];
        $addimg = "http://".$http."/storage/img/";

        $file = $req->file('admin_img');
        $addFileName = $addimg.time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
   		$fileName = time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/img/',$fileName);

         Admin::insert([
            'admin_name'=>$req->admin_name,
            'admin_mobile' =>$req->admin_mobile,
            'admin_id' =>$req->admin_id,
            'admin_email' =>$req->admin_email,
            'admin_password' =>Hash::make($req->admin_password),
            'admin_img'=> $addFileName
          ]);

          return back()->with('success','Admin Registered Successfully...Please Your Email Cheack..'); 
    }

     // admin login system functionally start form here
     public function adminlogin(Request $reqquest)
     {
         $reqquest->validate([
             'admin_id' => 'required',
             'ad_log_pass' => 'required'
         ]);
 
         $admin_id = $reqquest->admin_id;
        $adminfind = Admin::where('admin_id',$admin_id)->first();
        
        if ($adminfind == true) {
         if (Hash::check($reqquest->ad_log_pass,$adminfind->admin_password)) {
             $reqquest->Session()->put('admin_id',$adminfind->admin_id);
            return redirect(route('admin.home'));
         }else {
             return back()->with('error','Incorrect Password');
         }
        }else {
             return back()->with('error','Incorrect Admin Id');
        }
     }
      // admin login system functionally end form here
     // admin logout system function start form here
     public function adminlogout(Request $request)
     {
       if (Session::has('admin_id')) {
         session::pull('admin_id');
         return redirect('/admin/login');
       }
     }
     // admin logout system function end form here
 
}
