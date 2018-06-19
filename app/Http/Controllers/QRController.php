<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Reservation;
use App\QRCodes;
use QRCode;
use DB;
use Illuminate\Support\Facades\Hash;
use Storage;
use File;

class QRController extends Controller
{
    //
    public function show(Request $request){
      $user = Auth::user();
      $reserve_id = $request->all()['reserve_id'];
      $qr = QRCodes::where('reserve_id',$reserve_id)->first();
      $check = DB::table('reservations')->where('id', $reserve_id)->where('user_id',$user->id)->exists();
      if($qr && $check){
        $id = $qr->id;
        $qr = $qr->code;
        $q =  QRCode::text($qr)->png();
      }else{
        return response()->json(['error'=>'this is not your offer reservation']);
      }
    }

    public function showAPI(Request $request){
      $user = Auth::user();
      $reserve_id = $request->all()['reserve_id'];
      $qr = QRCodes::where('reserve_id',$reserve_id)->first();
      $check = DB::table('reservations')->where('id', $reserve_id)->where('user_id',$user->id)->exists();
      if($qr && $check){
        $id = $qr->id;
        $qr = $qr->code;
        $q = QRCode::text($qr);
        return response()->json(['data'=>$qr]);

        // return response()->json(['data'=>QRCode::text($qr)->setOutfile('public/qr.png')->png()]);
      }else{
        return response()->json(['error'=>'this is not your offer reservation']);
      }
    }

    public function generate(array $data){
      $code = Hash::make('onyvacode'.$data['user_id'].$data['reserve_id'].$data['offer_id']);
      QRCodes::updateOrCreate([
          'reserve_id'=>$data['reserve_id']
      ],[
        'reserve_id'=>$data['reserve_id'],
        'code'=>$code,
        'picture_url'=>''
      ]);
      return true;
    }
}
