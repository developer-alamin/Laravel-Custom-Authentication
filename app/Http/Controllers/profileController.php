<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Hash;
    
use Session;


class profileController extends Controller
{

   public function profile(Request $request)
   {
      $data = array();
      if (Session::has('logId')) {
        $data = User::where('id',Session::get('logId'))->first();
        return view('users.profile',compact('data'));
      }
    
   }

   public function updateShow(Request $request)
   {
      $showId = $request->id;
     $data = User::where('id',$showId)->get();
     return $data;
   }

   public function update(Request $request)
   {

      if ($request->hasFile('upimg')) {

         $http = $_SERVER['HTTP_HOST'];
         $addimg = "http://".$http."/storage/img/";
 
         $file = $request->file('upimg');
         $addFileName = $addimg.time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
   		$fileName = time().'/'.date('Y').'/'.date('m').'.'.$file->getClientOriginalExtension();
        $file->storeAs('public/img/',$fileName);

         $updatePreImg = $request->preImg;
         $explode = explode('/',$updatePreImg);
         $endImg = end($explode);
         $a = prev($explode);
         $aa = prev($explode);
         Storage::deleteDirectory('public/img/'.$aa);
      }else{
         $addFileName = $request->preImg;
      }
      
      $update = DB::table('users_table')->where('id',$request->updateId)->update([
         'users_name' => $request->upname,
         'users_father' => $request->upfname,
         'users_mother' => $request->upmother,
         'users_phone' => $request->upphone,
         'users_work' => $request->upwork,
         'users_email' => $request->upemail,
         'users_img' => $addFileName
      ]);
      return $update;
   }


   public function test(Request $request)
   {

      $img = 'http://127.0.0.1:8000/storage/img/1683803924/2023/5.jpg';
      $explode = explode('/',$img);
      $endImg = end($explode);
      $a = prev($explode);
      $aa = prev($explode);

      if(Storage::deleteDirectory('public/img/'.$aa)){
         echo "Deleted";
      }
   }
}