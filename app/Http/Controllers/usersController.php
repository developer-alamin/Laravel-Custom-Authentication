<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Hash;


class usersController extends Controller
{
    function home(){
      return view('home');
    }
    public function register(Request $req)
    {
      return view('users.register');
    }

    public function storeRegister(Request $req)
    {
      $req->validate([
        'users_email' => 'unique:users_table',
        'users_phone' =>  'unique:users_table',
        'image' => 'mimes:jpeg,png,jpg,gif,svg,webp|max:1024',
      ]);

        $http = $_SERVER['HTTP_HOST'];
        $addimg = "http://".$http."/storage/img/";

        $file = $req->file('image');
        $addFileName = $addimg.time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
   		  $fileName = time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/img/',$fileName);

       try {
        User::insert([
          'users_name'=>$req->users_name,
          'users_father'=>$req->users_father,
          'users_mother'=>$req->users_mother,
          'users_phone' =>$req->users_phone,
          'users_work' =>$req->users_work,
          'users_email' =>$req->users_email,
          'users_password' =>Hash::make($req->users_pass),
          'users_img'=> $addFileName,
          'date' =>$req->date
        ]);

        return back()->with('success','Users Registered Successfully'); 
       } catch (Exception $e) {
        return redirect()->back()->with('error','Users Registered Faild');
       }

    }

    public function usersLogin(Request $request)
    {
      $request->validate([
        'log_email' => 'required|email',
        'log_pass' => 'required'
      ]);

      $users = User::where('users_email',$request->log_email)->first();
      if($users == true){
        if (Hash::check($request->log_pass,$users->users_password)) {
          $request->Session()->put('logId',$users->id);
           return redirect('users/profile');
        }else{
          return back()->with('faild','Please Your Register Password');
        }
      }else{
        return back()->with('faild','Please Your Register gmail');
      }
    
   }


   public function logout(Request $request)
    {
      if (Session::has('logId')) {
        session::pull('logId');
        return redirect('/');
      }
    }
}
