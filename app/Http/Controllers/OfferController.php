<?php

namespace App\Http\Controllers;

use App\suspendedReservations;
use App\User;
use Illuminate\Http\Request;
use App\Offer;
use App\Influencer;
use App\Business;
use Auth;
use App\Reservation;
use DB;
use App\Http\Controllers\QRController;
use App\QRCodes;
use App\Comment;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Verta;

class OfferController extends Controller
{
    public $followersRanges=[
      [0,10000],[10000,30000],[30000,60000],[60000,100000],[100000,200000],[200000,400000],[400000,1000000],[1000000,7000000000]
    ];
    public $offerRanges = [50000,200000,400000,1000000,3000000,6000000,10000000,1000000000];
    public $costRanges = [6000,12000,18000,26000,39000,65000,79000,100000];
    //
    public function showOffers(){
      $user = Auth::user();
      $offers = [];
      if($user && $user->type == INFLUENCER){
        $followers = Influencer::where('user_id',$user->id)->first()->followers;
        for ($index=0; $index < count($this->followersRanges); $index++) {
          if($followers >= $this->followersRanges[$index][0] && $followers < $this->followersRanges[$index][1]){
            $offers = Offer::whereBetween('price',[15000,$this->offerRanges[$index]])->where('exp_date','>',date("Y-m-d"))->paginate(10);
          }
        }
        foreach ($offers as $offer) {
          $ownerName = Business::find($offer['owner'])->name;
          $offer['owner'] = $ownerName;
          $pictureUrls = explode(',',$offer['picture_url']);
          $offer['picture_url'] = 'img/default.jpg';
          if(!(empty($pictureUrls) || $pictureUrls[0] == "")){
              $offer['picture_url']=$pictureUrls[0];
          }
        }
        return $offers;

      }
      else if($user && $user->type == ADMIN){
        $offers = Offer::paginate(10);
        foreach ($offers as $offer) {
            $ownerName = Business::find($offer['owner'])->name;
            $offer['owner'] = $ownerName;
            $offer['picture_url'] = explode(',', $offer['picture_url']);
        }
        return view('influencerhome',['offers'=>$offers]);
      }
      return redirect('/');
    }
    public function searchOffers(Request $request){
      $user = Auth::user();
      $category = $request->query('category');
      if($user && $user->type == INFLUENCER){
        $followers = Influencer::where('user_id',$user->id)->first()->followers;
        for ($index=0; $index < count($this->followersRanges); $index++) {
          if($followers >= $this->followersRanges[$index][0] && $followers < $this->followersRanges[$index][1]){
            $offers = Offer::where('category',$category)->whereBetween('price',[15000,$this->offerRanges[$index]])->where('exp_date','>',date("Y-m-d"))->paginate(10);
            foreach ($offers as $offer) {
              $ownerName = Business::find($offer['owner'])->name;
              $offer['owner'] = $ownerName;
              $offer['picture_url'] = explode(',',$offer['picture_url']);
            }
            return $offers;
          }
        }
      }else if($user && $user->type == ADMIN){
        $offers = Offer::where('category',$category)->paginate(10);
        foreach ($offers as $offer) {
          $ownerName = Business::find($offer['owner'])->name;
          $offer['owner'] = $ownerName;
          $offer['picture_url'] = explode(',',$offer['picture_url']);
        }
        return $offers;
      }
      return redirect('/home');
    }
    public function reserveOffer(Request $request){
      $user = Auth::user();
      $offer = $request->input('offer_id');
      if($user && $user->type == INFLUENCER){
        $followers = Influencer::where('user_id',$user->id)->first()->followers;
        $offer = Offer::find($request->input('offer_id'));
        $business = Business::find($offer->owner);
        if($offer->reserved >= $offer->numbers){
          return abort(500);
        }
        if( date('Y-m-d',strtotime($request->all()['time'])) > date('Y-m-d',strtotime($offer->exp_date)) ){
          return abort(500);
        }
        $reservation = Reservation::updateOrCreate([
          'user_id'=>$user->id,
          'offer_id'=>$offer->id,
        ],['user_id'=>$user->id,
        'offer_id'=>$offer->id,
        'time'=>$request->input('time')
        ]);
        if(! app('App\Http\Controllers\QRController')->generate([
          'reserve_id'=>$reservation->id,
          'offer_id'=>$offer->id,
          'user_id'=>$user->id
          ])){
          return abort(500);
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
            return redirect('/showOffer?id='.$offer->id);
          }
        }
      }
      return redirect('/home');
    }
    public function showOffer(Request $request){
      $user = Auth::user();
      if($user && $user->type == INFLUENCER){
        $influencer = Influencer::where('user_id',$user->id)->first();
        $id = $request->query('id');
        $offer = Offer::find($id);
        if(!$offer){
          return abort(404);
        }
        $business = Business::find($offer->owner);
        $index = 0;
        for ($i=0; $i < count($this->followersRanges) ; $i++) {
          if($influencer->followers > $this->followersRanges[$i][0] && $influencer->followers < $this->followersRanges[$i][1] ){
            if($offer->price < $this->offerRanges[$i]){
              $reserve = Reservation::where([['user_id','=',$user->id],['offer_id','=',$offer->id]])->first();
              if($reserve && $reserve->used == false ){
                $offer->reserved = true;
              }else{
                $offer->reserved = false;
              }
              $offer->owner = $business->name;
              $offer->address = $business->address;
              $offer->picture_url = explode(',',$offer->picture_url);
              $offer->comments = Comment::where('offer_id',$offer->id)->get();
              return $offer;
            }
          }
        }
        return abort(404);
      }else if($user->type == ADMIN){
        $id = $request->query('id');
        $offer = Offer::find($id);
        if(!$offer){
          return abort(404);
        }
        $business = Business::find($offer->owner);
        $offer->owner = $business->name;
        $offer->address = $business->address;
        $offer->picture_url = explode(',',$offer->picture_url);
        $offer->comments = Comment::where('offer_id',$offer->id)->get();
        return $offer;
      }else if($user->type == Business){
        $id = $request->input('id');
        $offer = Offer::find($id);
        if(!$offer){
          return abort(404);
        }
        if($user->id == $offer->owner){
          $business = Business::find($offer->owner);
          $offer->owner = $business->name;
          $offer->address = $business->address;
          $offer->picture_url = explode(',',$offer->picture_url);
          $offer->comments = Comment::where('offer_id',$offer->id)->get();
          return $offer;
        }
      }
      return redirect('/home');
    }
    public function makeOffer(Request $request){

      $offer = new Offer;
      $offer->title = $request->input('title');
      $offer->owner = Auth::user()->id;
      $photos = $request->file('photos');
      $picture_url = "";
      foreach ($photos as $photo) {
        $filename = 'onyva_'.date('now').$photo->getClientOriginalName();
        $path = Storage::putFileAs(
            'public/photos', $photo, 'onyva_'.date('now').$photo->getClientOriginalName()
        );
        $picture_url = $picture_url.url('storage/photos/'.$filename).',';
      }
      $offer->picture_url = substr($picture_url,0,-1);


      $offer->description = $request->input('description');
      $offer->numbers = (int)$request->input('numbers');
      $offer->category = $request->input('category');
      $offer->escort = (int)$request->input('escort');
      $offer->escort_conditions = $request->input('escort_conditions');
      $offer->start_date = $request->input('start_date');
      $offer->exp_date = $request->input('exp_date');
      $offer->start_time = $request->input('start_time');
      $offer->end_time = $request->input('end_time');
      $offer->price = $request->input('price');

      $offer->save();
      return redirect('/home');


    }
    public function removeOffer(Request $request){
      $offer = Offer::find((int)$request->input('id'));
      $offer->delete();
      return redirect('/home');
    }
    public function showMyOffers(){
        $user = Auth::user();
        $offers = Offer::where('owner',$user->id)->get();
        foreach ($offers as $offer) {
            $ownerName = Business::find($offer['owner'])->name;
            $offer['owner'] = $ownerName;
            $pictureUrls = explode(',',$offer['picture_url']);
            $offer['picture_url'] = 'img/default.jpg';
            if(!(empty($pictureUrls) || $pictureUrls[0] == "")){
                $offer['picture_url']=$pictureUrls[0];
            }

        }
        $credit = Business::where('user_id',$user->id)->select('credit')->first()->credit;
        return view('businesshome', compact('offers','credit'));
    }
    public function showMyHistory(){
      $user = Auth::user();
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
        return view('influencerhistory',compact('reservations'));
      }
      return redirect('/home');
    }
    public function cancelReservation(Request $request){
      $id = (int)$request->input('id');
      $user = Auth::user();
      $reserv = Reservation::where([['user_id','=',$user->id],['id','=',$id]])->first();
      $reserv->active = 0;
      $reserv->save();
      return redirect('/home');
    }
    public function showLastOffers(Request $request){
      //nemidunam chie
    }
    public function consume(Request $request){
      $code = $request->all()['code'];
      $qr = QRCodes::where('code',$code)->first();
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
      }
      return "have a nice day!";
    }
}
