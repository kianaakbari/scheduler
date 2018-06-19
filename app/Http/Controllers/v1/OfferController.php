<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Offer;
use App\Influencer;
use App\Business;
//use Auth;
use App\Reservation;
use DB;
use Auth;
use App\Http\Controllers\QRController;
use App\QRCodes;
use App\Comment;
// user types
define("BUSINESS",1);
define("INFLUENCER",2);
define("ADMIN",3);

class OfferController extends Controller
{
    public $followersRanges=[
        [0,10000],[10000,30000],[30000,60000],[60000,100000],[100000,200000],[200000,400000],[400000,1000000],[1000000,7000000000]
    ];
    public $offerRanges = [50000,200000,400000,1000000,3000000,6000000,10000000,1000000000];
    public $costRanges = [6000,12000,18000,26000,39000,65000,79000,100000];
    //
    public function showOffers(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        if($user && $user->type == INFLUENCER){
            $followers = Influencer::where('user_id',$user_id)->first()->followers;
            for ($index=0; $index < count($this->followersRanges); $index++) {
                if($followers >= $this->followersRanges[$index][0] && $followers < $this->followersRanges[$index][1]){
                    $offers = Offer::whereBetween('price',[15000,$this->offerRanges[$index]])->where([['exp_date','>',date("Y-m-d")]])->paginate(10);
                }
            }
            foreach ($offers as $offer) {
              $b = Business::find($offer['owner']);
              $ownerName = $b->name;
              $offer['owner'] = $ownerName;
              $offer['picture_url'] = explode(',',$offer['picture_url']);
              if(!empty($offer['picture_url'])){
                $offer['picture_url'] = $offer['picture_url'][0];
              }else{
                $offer['picture_url'] = "";
              }
              $offer['logo'] = $b->picture_url;
            }
            return response()->json($offers);
        }
        else if($user && $user->type == ADMIN){
            $offers = Offer::paginate(10);
            foreach ($offers as $offer) {
              $b = Business::find($offer['owner']);
              $ownerName = $b->name;
              $offer['owner'] = $ownerName;
              $offer['picture_url'] = explode(',',$offer['picture_url']);
              if(!empty($offer['picture_url'])){
                $offer['picture_url'] = $offer['picture_url'][0];
              }else{
                $offer['picture_url'] = "";
              }
              $offer['logo'] = $b->picture_url;
            }
            return response()->json($offers);
        }
    }
    public function searchOffers(Request $request){

        $user = Auth::user();
        $user_id = $user->id;
        $category = $request->all()['category'];
        if($user && $user->type == INFLUENCER){
            $followers = Influencer::where('user_id',$user->id)->first()->followers;
            for ($index=0; $index < count($this->followersRanges); $index++) {
                if($followers >= $this->followersRanges[$index][0] && $followers < $this->followersRanges[$index][1]){
                    $offers = Offer::where('category',$category)->whereBetween('price',[15000,$this->offerRanges[$index]])->where('exp_date','>',date("Y-m-d"))->paginate(10);
                    foreach ($offers as $offer) {
                      $b = Business::find($offer['owner']);
                      $ownerName = $b->name;
                      $offer['owner'] = $ownerName;
                      $offer['picture_url'] = explode(',',$offer['picture_url']);
                      if(!empty($offer['picture_url'])){
                        $offer['picture_url'] = $offer['picture_url'][0];
                      }else{
                        $offer['picture_url'] = "";
                      }
                      $offer['logo'] = $b->picture_url;
                    }
                    return response()->json($offers);
                }
            }
        }else if($user && $user->type == ADMIN){
            $offers = Offer::where('category',$category)->paginate(10);
            foreach ($offers as $offer) {
              $b = Business::find($offer['owner']);
              $ownerName = $b->name;
              $offer['owner'] = $ownerName;
              $offer['picture_url'] = explode(',',$offer['picture_url']);
              if(!empty($offer['picture_url'])){
                $offer['picture_url'] = $offer['picture_url'][0];
              }else{
                $offer['picture_url'] = "";
              }
              $offer['logo'] = $b->picture_url;
            }
            return response()->json($offers);
        }
    }
    public function reserveOffer(Request $request){
        $user = Auth::user();
        $offer_id = $request->all()['offer_id'];
        if($user && $user->type == INFLUENCER){
            $followers = Influencer::where('user_id',$user->id)->first()->followers;
            $offer = Offer::find((int)$offer_id);
            $business = Business::find($offer->owner);
            if($offer->reserved >= $offer->numbers){
                return response()->json(['error'=>'Offer capacity is full'],500);
            }
            if( date('Y-m-d',strtotime($request->all()['time'])) > date('Y-m-d',strtotime($offer->exp_date)) ){
              return response()->json(['error'=>'Time is not valid'],500);
            }
            $reservation = Reservation::updateOrCreate([
                'user_id'=>$user->id,
                'offer_id'=>$offer->id,
            ],['user_id'=>$user->id,
                'offer_id'=>$offer->id,
                'time'=>$request->all()['time']
            ]);
            if(! app('App\Http\Controllers\QRController')->generate([
              'reserve_id'=>$reservation->id,
              'offer_id'=>$offer->id,
              'user_id'=>$user->id
              ])){
              return response()->json(['error'=>'qr'],500);
            }
            for ($index=0; $index < count($this->followersRanges); $index++) {
                if($followers >= $this->followersRanges[$index][0] && $followers < $this->followersRanges[$index][1]){
                    $cost = $this->costRanges[$index];
                    $business->credit = $business->credit - $cost;
                    if($business->credit < 0){
                        // send notification for businesses to recharge their account
                    }
                    $offer->reserved = $offer->reserved + 1 ;
                    $business->save();
                    $offer->save();
                    return response()->json(['data'=>$reservation],200);
//                    return redirect('/showOffer?id='.$offer->id);
                }
            }
        }
    }
    public function showOffer(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        if($user && $user->type == INFLUENCER){
            $influencer = Influencer::where('user_id',$user->id)->first();
            $id = $request->query('id');
            $offer = Offer::find($id);
            if($offer == null){
                return response()->json(['error'=>'404']);
            }
            $business = Business::find($offer->owner);
            $index = 0;
            for ($i=0; $i < count($this->followersRanges) ; $i++) {
                if($influencer->followers > $this->followersRanges[$i][0] && $influencer->followers < $this->followersRanges[$i][1] ){
                    if($offer->price < $this->offerRanges[$i]){
                        $reserve = Reservation::where([['user_id','=',$user_id],['offer_id','=',$offer->id]])->first();
                        if($reserve && $reserve->used == false ){
                          $offer->reserved = true;
                        }else{
                          $offer->reserved = false;
                        }
                        $offer->owner = $business->name;
                        $offer->address = $business->address;
                        $offer->picture_url = explode(',',$offer->picture_url);
                        return response()->json(['data'=>$offer],200);
                    }
                }
            }
            return response()->json(['error'=>'404'],404);
        }else if($user->type == ADMIN){
            $id = $request->query('id');
            $offer = Offer::find($id);
            if(!$offer){
                return response()->json(['error'=>'404']);
            }
            $business = Business::find($offer->owner);
            $offer->owner = $business->name;
            $offer->address = $business->address;
            $offer->picture_url = explode(',',$offer->picture_url);
            return response()->json($offer);
        }else if($user->type == Business){
            $id = $request->query('id');
            $offer = Offer::find($id);
            if(!$offer){
                return response()->json(['error'=>'404']);
            }
            if($user->id == $offer->owner){
                $business = Business::find($offer->owner);
                $offer->owner = $business->name;
                $offer->address = $business->address;
                $offer->picture_url = explode(',',$offer->picture_url);
                return response()->json(['data'=>$offer],200);
            }
        }
    }
    public function makeOffer(Request $request){
        $user = Auth::user();
        if($user->type != BUSINESS){
          return response()->json(['error'=>'You have not permission of this action'],404);
        }
        $offer = new Offer;
        $offer->title = $request->all()['title'];
        $offer->owner = $request->all()['owner'];
        if($request->all()['picture_url']){
            $offer->picture_url = $request->all()['picture_url'];
        }
        $offer->description = $request->all()['description'];
        $offer->numbers = (int)$request->all()['numbers'];
        $offer->category = $request->all()['category'];
        $offer->escort = (int)$request->all()['escort'];
        $offer->escort_conditions = $request->all()['escort_conditions'];
        $offer->start_date = $request->all()['start_date'];
        $offer->exp_date = $request->all()['exp_date'];
        $offer->start_time = $request->all()['start_time'];
        $offer->end_time = $request->all()['end_time'];
        $offer->price = $request->all()['price'];
        $offer->save();
        return response()->json(['data'=>$offer],200);
    }
    public function removeOffer(Request $request){
        $user = Auth::user();
        if($user->type == INFLUENCER){
          return response()->json(['error'=>'You have not permission of this action'],404);
        }
        $offer = Offer::find((int)$request->all()['offer_id']);
        $offer->delete();
        return response()->json(['data'=>'offer deleted successfuly!'],200);
    }
    public function showMyOffers(Request $request){
        $user = Auth::user();
        if($user && $user->type == BUSINESS){
            $offers = Offer::where('owner',$user->id)->paginate(10);
            return response()->json($offers,200);
        }
    }
    public function showMyHistory(){
        $user = Auth::user();
        $user_id = $user->id;
        if($user->type == INFLUENCER){
            $reservations = DB::table('reservations')->select(['reservations.*','offers.title','offers.picture_url', 'offers.owner'])->leftJoin('offers','reservations.offer_id','offers.id')->where([['user_id','=',$user->id],['active','=',true]])->paginate(10);
            foreach ($reservations as $reservation) {
                $pictureUrls = explode(',',$reservation->picture_url);
                $reservation->picture_url = 'img/default.jpg';
                if(!(empty($pictureUrls) || $pictureUrls[0] == "")){
                    $reservation->picture_url=$pictureUrls[0];
                }
                $datetime = explode(' ',$reservation->time);;
                $reservation->date = $datetime[1];
                $reservation->time = $datetime[0];
                $business = Business::find($reservation->owner)->select(['name','picture_url'])->first();
                $reservation->owner = $business->name;
                $reservation->logo = $business->picture_url;
            }
            return response()->json($reservations,200);
        }
    }
    public function cancelReservation(Request $request){
        $id = (int)$request->all()['id'];
        $user = Auth::user();
        $user_id = $user->id;
        $reserv = Reservation::where([['user_id','=',$user->id],['id','=',$id]])->first();
        if(!$reserv){
          return response()->json(['error'=>'reserve not found'],404);
        }
        $reserv->active = 0;
        $reserv->save();
        return response()->json(['data'=>'reservation canceled'],200);
    }
    public function showLastOffers(Request $request){
        //nemidunam chie
    }
    public function consume(Request $request){
      $code = $request->all()['code'];
      $qr = QRCodes::where('code','=',$code)->first();
      if($qr == null){
        return response()->json(['error'=>'Code is not valid!'],404);
      }
      $reservation = Reservation::where('id',$qr->reserve_id)->first();
      if($reservation->active == true && $reservation->used == false){
        $reservation->used = true;
        $reservation->save();

        $user = User::find($reservation->user_id);
        $influencer = Influencer::where('user_id', $user->id)->first();
        $offer = Offer::find($reservation->offer_id);
        $business = Business::find($offer->owner);
        $suspendedReservation = suspendedReservations::updateOrCreate([
            'reservation_id'=>$reservation->id
        ],[
            'time' => $reservation->time,
            'infuencer_instagram_token' => $influencer->instagram_token,
            'business_instagram_username' => $business->instagram_account
        ]);

        return response()->json(['data'=>'have a nice day!'],200);
      }
      return response()->json(['error'=>'This offer is no longer available!'],404);
    }
}
