<?php

namespace App\Http\Controllers;
use App\Influencer;
use App\User;
use Auth;
use App\Reservation;
// user types



use Illuminate\Http\Request;

class InfluencerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProfile(){
        $user = Auth::user();
        if($user->type == INFLUENCER){
            $influencer = Influencer::where('user_id',$user->id)->first();
            $category = $influencer->category;
            $influencer->upcomingReservations = Reservation::where([['user_id','=',$user->id],['time','>',date("Y-m-d H:i:s")]])->get()->count();
            $influencer->usedReservations = Reservation::where([['user_id','=',$user->id],['used','=',1]])->get()->count();
            if($category === NULL){
                $influencer->category = 0;
            }
            return view('influencerprofile',compact('influencer'));
        }
        return redirect('/');

    }
    public function editProfile(Request $request){
        $user = Auth::user();
        if($user->type == INFLUENCER){
            $influencer = Influencer::where('user_id',Auth::user()->id)->first();
            Influencer::where('user_id',Auth::user()->id)->update([
            'name'=>$request->input('name'),
            'gender'=>$request->input('gender'),
            'category'=>$request->input('category'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
            ]);
            return redirect('/showInfluencerProfile');
        }else{
            return redirect('/');
        }
    }
}
