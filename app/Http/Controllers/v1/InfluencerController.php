<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Influencer;
use App\User;
use Auth;
// user types
define("BUSINESS",1);
define("INFLUENCER",2);
define("ADMIN",3);

class InfluencerController extends Controller
{
    public function showProfile(){

        $user = Auth::user();
        $user_id = $user->id;

        if($user->type == INFLUENCER){
            $influencer = Influencer::where('user_id',$user_id)->first();
            $success = $influencer;
            return response()->json(['data'=>$success],200);
        }
        else{
//            return some error
            return response()->json(['error'=>'You are not an influencer'],401);
        }
    }

    public function editProfile(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        if($user->type == INFLUENCER){
            Influencer::where('user_id',$user_id)->update([
                'name'=>$request->all()['name'],
                'gender'=>$request->all()['gender'],
                'category'=>$request->all()['category'],
                'email'=>$request->all()['email'],
                'phone'=>$request->all()['phone'],
            ]);
            $influencer = Influencer::where('user_id',$user_id)->first();
            $success = $influencer;
            return response()->json(['data'=>'success'],200);

        }else{
            //return some error
            return response()->json(['error'=>'You are not an influencer'],401);
        }
    }
}
