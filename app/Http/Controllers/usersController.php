<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use Exception;
use App\Models\User;
use App\Models\verify;
use App\Mail\verifyMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


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

       $users = User::create([
          'users_name'=>$req->users_name,
          'users_father'=>$req->users_father,
          'users_mother'=>$req->users_mother,
          'users_phone' =>$req->users_phone,
          'users_work' =>$req->users_work,
          'users_email' =>$req->users_email,
          'users_password' =>Hash::make($req->users_pass),
          'users_img'=> $addFileName
        ]);

        verify::create([
          'user_token' => Str::random(40),
          'user_id' => $users->id
        ]);
        
        Mail::to($users->users_email)->send(new verifyMail($users));

        return back()->with('success','Users Registered Successfully...Please Your Email Cheack..'); 

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
          if ($users->users_email_verified_at == null) {
            return back()->with('error','Please Your Mail Check The Email Verify Before Login');
            return redirect(route('logout'));
          }else{
            $request->Session()->put('logId',$users->id);
            return redirect('users/profile');
          }
        }else{
          return back()->with('error','Please Your Register Password');
        }
      }else{
        return back()->with('error','Please Your Register gmail');
      }
    
   }

   public function usersVerify($token)
   {
      $verifyToken = verify::where('user_token',$token)->first();
      
      if (isset($verifyToken)) {
      $userVerify = $verifyToken->User;
        if (!($userVerify->users_email_verified_at)) {
          $userVerify->users_email_verified_at = Carbon::now();
          $userVerify->save();
          return redirect(route('login'))->with('success','Your Email Has Been Verifyed');
        }else{
          return redirect(route('login'))->with('error','Your Email Already Verifyed');
        }
      }else{
        return redirect(route('users.register'))->with('error','Please Again Register Then Email Verify..');
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
