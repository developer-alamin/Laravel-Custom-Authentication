<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\verify;
use App\Mail\updateMail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Type\TrueType;
use Illuminate\Support\Facades\Storage;

class adminController extends Controller
{
    public function adminHome()
    {

        $verifyDataDate = User::select('id','users_email_verified_at')->get()->groupBy(function($data)
       {
         return carbon::parse($data->date)->format('D');
       });

       $verifyDays = [];
       $verifydaysCount = [];
       foreach ($verifyDataDate as $verifydataKey => $verifydataVelue) {
           $verifyDays[]=$verifydataKey;
           $verifydaysCount[]=count($verifydataVelue);
       }




        $usersData = User::count();
        $verifyData = verify::count();
        $nonVerify = User::where('users_email_verified_at',null)->count();
        $data = [];
        if (Session::has('admin_id')) {
            $data = Admin::where('admin_id',Session::get('admin_id'))->first();
            return view('admin.dashboard',
            compact(
                'data',
                'usersData',
                'verifyData',
                'nonVerify',
                'verifyDays',
                'verifydaysCount'
            ));
        }
    }

    public function adminUsers()
    {
        return view('admin.users');
    }
    public function adminVerifyed()
    {
        return view('admin.verifyuser');
    }
    public function adminNonVerifyed()
    {
        return view('admin.nonverify');
    }

    // get users data functionally code start form here
    public function admingetusers(Request $reqquest)
    {
      $allUser = User::all();
      return $allUser;
    }
    // get users data functionally code start form here
    // verify get data functionally code start form here
    public function admingetverifyed(){
        $verufyed = User::all();
        return $verufyed;
    }
    // verify get data functionally code start form here

    // non verify get data functionally code start form here
    public function admingetnonverifyed()
    {
       $nonverify = User::where('users_email_verified_at',null)->get();
       return $nonverify;
    }
    // non verify get data functionally code end form here

    // non verify delete functionally code start form here
    public function nonverifyDelete(Request $reqquest)
    {

        $deleteId = $reqquest->id;

        $delete = User::find($deleteId);
        $deleteImg = $delete->users_img;

        $explode = explode('/',$deleteImg);
        $endImg = end($explode);
        $firstprev = prev($explode);
        $secondPrev = prev($explode);
        if (Storage::deleteDirectory('public/img/'.$secondPrev)) {
            $dataDelete = User::destroy($deleteId);
          }
          return $dataDelete;
    }
    // non verify delete functionally code end form here
    // admin nonuser update show functionnally code start form here
    public function nonusersUpdateShow(Request $reqquest)
    {
       $dataShowId = $reqquest->id;
      $dataShow = User::where('id',$dataShowId)->get();
      return $dataShow;
    }
     // admin nonuser update show functionnally code end form here

    // admin nonuser update functionally start form here
    public function nonUserUpdate(Request $reqquest)
    {
       $updateId = $reqquest->updateId;
       $updateEmail = $reqquest->upemail;
        $nonUserAlredyEamil = User::where('users_email',$updateEmail)->count();
        if ($nonUserAlredyEamil == 1) {
            return 500;
        }elseif ($updateId and $updateEmail == true) {
            $nonuser = User::where('id',$updateId)->update([
             'users_email' => $updateEmail
            ]);
            $nonUsersdata = User::find($updateId);

            if ($nonuser == true) {
                Mail::to($nonUsersdata->users_email)->send(new updateMail($nonUsersdata));
                return 1;
            }
        }else{
            return 0;
        }
       
    }
      // admin nonuser update functionally end form here

    // admin login page functionally start form here
    public function login(Request $reqquest)
    {
       return view('auth.adminlogin');
    }
    // admin login page functionally end form here

   
}
