<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Commnet;
use App\Reservation;
use App\Offer;
use App\Discount;
use App\Vote;



class CommentController extends Controller
{
    //
    public function putComment(Request $request){
      $user = Auth::user();
      if($user->type == INFLUENCER){
        $reserve_id = $request->all()['reserve_id'];
        $comment = $request->all()['comment'];
        $rate = $request->all()['rate'];
        $reserve = Reservation::find($reserve_id);
        if($reserve->is_discount){
          $cm = Comment::create([
            'user_id'=>$user->id,
            'discount_id'=>$reserve->discount_id,
            'comment'=>$comment,
            'rate'=>$rate
        ]);
          $reserve->commented = true;
          $reserve->save();
          $total = Comment::where('discount_id',$reserve->discount_id)->count();
          $d = Discount::find($reserve->discount_id);
          $d->rate = ($d->rate + $rate) / $total;
          $d->save();
          $vote = Vote::firstOrNew(['discount_id'=>$reserve->discount_id]);
          switch ($rate) {
            case 1:
              $vote->one += 1;
              $vote->save();
              // code...
              break;
            case 2:
              $vote->two += 1;
              $vote->save();
              break;
            case 3:
              $vote->three += 1;
              $vote->save();
              break;
            case 4:
              $vote->four += 1;
              $vote->save();
              break;
            case 5:
              $vote->five += 1;
              $vote->save();
              break;

            default:
              // code...
              break;
          }
          return $cm;
        }else{
          $cm = Comment::create([
            'user_id'=>$user->id,
            'offer_id'=>$reserve->offer_id,
            'comment'=>$comment,
            'rate'=>$rate
        ]);
          $reserve->commented = true;
          $reserve->save();
          $total = Comment::where('offer_id',$reserve->offer_id)->count();
          $o = Offer::find($reserve->offer_id);
          $o->rate = ($o->rate + $rate) / $total;
          $o->save();

          $vote = Vote::firstOrNew(['offer_id'=>$reserve->offer_id]);
          switch ($rate) {
            case 1:
              $vote->one += 1;
              $vote->save();
              // code...
              break;
            case 2:
              $vote->two += 1;
              $vote->save();
              break;
            case 3:
              $vote->three += 1;
              $vote->save();
              break;
            case 4:
              $vote->four += 1;
              $vote->save();
              break;
            case 5:
              $vote->five += 1;
              $vote->save();
              break;

            default:
              // code...
              break;
          }

          return $cm;
        }
      }
    }
}
