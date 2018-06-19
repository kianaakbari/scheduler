<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Discount;
use App\Codes;

class DiscountController extends Controller
{
    //

    public $followersRanges=[
        [0,10000],[10000,30000],[30000,60000],[60000,100000],[100000,200000],[200000,400000],[400000,1000000],[1000000,7000000000]
    ];
    public $offerRanges = [50000,200000,400000,1000000,3000000,6000000,10000000,1000000000];
    public $costRanges = [6000,12000,18000,26000,39000,65000,79000,100000];

    public function showDiscounts(){
      $user = Auth::user();
      $user_id = $user->id;
      if($user && $user->type == INFLUENCER){
          $followers = Influencer::where('user_id',$user_id)->first()->followers;
          for ($index=0; $index < count($this->followersRanges); $index++) {
              if($followers >= $this->followersRanges[$index][0] && $followers < $this->followersRanges[$index][1]){
                  $discounts = Discount::whereBetween('price',[15000,$this->offerRanges[$index]])->where([['exp_date','>',date("Y-m-d")]])->paginate(10);
              }
          }
          foreach ($discounts as $d) {
            $ownerName = Business::find($offer['owner'])->name;
            $offer['owner'] = $ownerName;
          }
          return response()->json($offers);
      }
      else if($user && $user->type == ADMIN){
          $discounts = Discount::paginate(10);
          foreach ($discounts as $d) {
            $ownerName = Business::find($d['owner'])->name;
            $d['owner'] = $ownerName;
          }
          return response()->json($offers);
      }
    }

    public function makeDiscount(Request $request){
      $codes = $request->all()['codes'];
      $data = $request->all()['data'];
      $user = Auth::user();
      if($user->type == BUSINESS){
        $discount = Discount::create([
          'owner'=>$user->id,
          'title'=>$data['title'],
          'description'=>$data['description'],
          'start_date'=>$data['start_date'],
          'exp_date'=>$data['exp_date'],
          'price'=>$data['price'],
          'numbers'=>count($codes)
        ]);
        foreach ($codes as $code) {
          Codes::create([
            'code'=>$code,
            'discount_id'=>$discount->id
          ]);
        }
        return $discount;
      }else{
        return "you have no permission of this";
      }
    }
    public function reserve(Request $request){
      $user = Auth::user();
      if($user->type == INFLUENCER){
        $id = $request->all()['discount_id'];
        $code_data = Code::where([['discount_id','=',$id],['used','=',false]])->first();
        if($code_data == null){
          return "there is no code remained";
        }
        $code_data->user = $user->id;
        $reservation = Reservation::updateOrCreate([
            'user_id'=>$user->id,
            'discount_id'=>$code_data->discount_id
        ],['user_id'=>$user->id,
            'discount_id'=>$code_data->discount_id,
            'is_discount'=>true,
        ]);
        $code_data->reserve_id = $reservation->id;
      }


    }
    public function consume(Request $request){
      $code = $request->all()['code'];
      $code_data = Code::where('code',$code)->first();
      $reservation = Reservation::find($code_data->reserve_id);
      $code_data->used = true;
      $reservation->used = true;
      return "success";
    }
}
