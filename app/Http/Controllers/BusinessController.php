<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Business;
use Storage;
define("BUSINESS",1);
define("INFLUENCER",2);
define("ADMIN",3);

class BusinessController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile(Request $request){
      $user = Auth::User();
      if($user->type == BUSINESS){
        $business = Business::where('user_id',$user->id)->first();
        return view('businessprofile',['business'=>$business]);
      }
      return redirect('/home');
    }

    public function showEditProfile(){
      $user = Auth::user();
      if($user->type == BUSINESS){
          $business = Business::where('user_id',$user->id)->first();
          return view('editprofile_business',compact('business'));
      }
      return redirect('/');
    }
    public function editProfile(Request $request){
      // $data = $request->validate([
      //     'phone' => 'numeric|size:11',
      //     'Name' => 'string',
      //     'address'=>'string|nullable',
      //     'email'=>'email|nullable'
      // ]);
      $data['phone'] = $request->all()['phone'];
      $data['address'] = $request->all()['address'];
      $data['email'] = $request->all()['email'];
      $data['name'] = $request->all()['name'];
      $data['instagram_account'] = $request->all()['instagram_account'];
      if($request->file('photo')){
        $photo = $request->file('photo');
        $filename ='onyva_'.date('now').$photo->getClientOriginalName();
        $path = Storage::putFileAs(
            'public/photos/business', $photo, $filename
        );
        $data['picture_url'] = url('storage/photos/business/'.$filename);

      }
      $user = Auth::user();
      if($user->type == BUSINESS){
        $success = Business::where('user_id',$user->id)->update($data);
        if($success){
          return redirect('/home');
        }
      }
    }

    public function financialReport(){
        $user = Auth::user();
        if($user->type == BUSINESS){
            $business = Business::where('user_id',$user->id)->first();
            $credit = $business->credit;
            return view('/financialReport', compact('credit'));
        }
        return redirect('/home');
    }

    public function increaseCredit(){
        $user = Auth::user();
        if($user->type == BUSINESS){
            $business = Business::where('user_id',$user->id)->first();
            $credit = $business->credit;
            return view('/increasecredit', compact('credit'));
        }
        return redirect('/home');
    }
}
