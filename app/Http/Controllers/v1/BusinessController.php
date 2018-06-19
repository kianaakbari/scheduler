<?php

namespace App\Http\Controllers\v1;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Auth;
use App\Business;
define("BUSINESS",1);
define("INFLUENCER",2);
define("ADMIN",3);

class BusinessController extends Controller
{
    public function showProfile(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        if($user->type == BUSINESS){
            $business = Business::where('user_id',$user_id)->first();
            return response()->json(['data'=>$business],200);
        }
        else{
//            return some error
          return response()->json(['error'=>'You are not a Business'],401);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
          'phone' => 'numeric|size:10',
          'name' => 'string',
          'address'=>'string|nullable',
          'email'=>'email|nullable|unique'
        ]);
    }

    public function editProfile(Request $request){
        $validator = validator($request->all());
        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],422);
        }
        $user = Auth::user();
        $user_id = $user->id;

        if($user->type == BUSINESS){
            Business::where('user_id',$user_id)->update(
                [
                    'phone' => $request->all()['phone'],
                    'name' => $request->all()['name'],
                    'address'=> $request->all()['address'],
                    'email'=> $request->all()['email']
                ]);
            $business = Business::where('user_id',$user_id)->first();
            return response()->json(['data'=>$business],200);
        }else{
          return response()->json(['error'=>'You are not a Business'],401);
        }
    }
}
