<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use App\Business;
use App\Influencer;
use Illuminate\Support\Facades\Hash;
use GuzzleHttp\Client;


class UserController extends Controller
{
    //

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }
    public function businessLogin(Request $request){
      $validator= validator($request->user);
      if($validator->fails()){
        return response()->json(['error'=>$validator->errors()],401);
      }
      if(Auth::attempt(['username'=>$request->input('user.username'),'password'=>$request->input('user.password')])){
        $user = Auth::user();
        $success['token']= $user->createToken('MyApp')->accessToken;
        Auth::login($user);
        return response()->json(['success'=>$success],200)->header('code',$success['token']);
      }else{
        return response()->json(['error'=>'Unauthorised'],401);
      }
    }

    public function businessRegister(Request $request){
      $validator= validator($request->user);

      if($validator->fails()){
        return response()->json(['error'=>$validator->errors()],401);
      }

      $user = User::create([
          'username' => $request->input('user.username'),
          'password' => Hash::make($request->input('user.password')),
          'type' => 1,
      ]);
      $businness = Business::create([
          'user_id'=>$user->id,
          'name' => $request->input('data.name'),
          'phone' => $request->input('data.phone'),
          'email' => $request->input('data.email'),
          'address' => $request->input('data.address'),
          'instagram_account' => $request->input('data.instagram_account'),
          'credit' => 75000
      ]);
      $success['token']=$user->createToken('MyApp')->accessToken;
      $success['name']=$user->username;
      return response()->json(['success'=>$success],200)->header('code',$success['token']);
    }

    public function redirectToInstagram(Request $request){

      $device = $request->all()['device'];
      return redirect('https://api.instagram.com/oauth/authorize/?client_id='.env('insta_client_id').'&redirect_uri='.HOSTNAME.'/api/'.APIVERSION.'/influencerLogin?system='.$device.'&response_type=code&scope=basic+comments+relationships+likes+follower_list');
    }
    public function influencerLogin(Request $request){
      $client = new Client(); //GuzzleHttp\Client
      $result = $client->post('https://api.instagram.com/oauth/access_token', [
          'form_params' => [
              'client_id'=>env('insta_client_id'),
              'client_secret' => env('insta_client_secret'),
              'grant_type'=>'authorization_code',
              'redirect_uri'=>HOSTNAME.'/api/'.APIVERSION.'/influencerLogin?system='.$request->query('system'),
              'code'=>$request->query('code'),
          ]
      ]);
      $info = json_decode($result->getBody());
      $device = $request->query('system');
      $user = User::firstOrCreate([
        'username'=>(string)$info->user->id,
        'type'=>INFLUENCER,
      ]);
      $influencer = Influencer::updateOrCreate([
        'user_id'=>$user->id
      ],[
        'user_id'=>$user->id ,
        'name'=>$info->user->full_name,
        'instagram_username'=>$info->user->username,
        'instagram_token'=>$info->access_token,
        'picture_url'=>$info->user->profile_picture,
        'followers'=>0,
        'following'=>0
      ]);
      $client = new Client();
      $result = json_decode($client->get('https://api.instagram.com/v1/users/self/?access_token='.$info->access_token)->getBody());
      $influencer->followers = $result->data->counts->followed_by;
      $influencer->following = $result->data->counts->follows;
      $influencer->save();
      $success['token']=$user->createToken('MyApp')->accessToken;
      $success['name']=$user->username;
      if(strcmp($device,"android") == 0){
          $newURL = 'intent:#Intent;action=com.getOnyvaResponse;category=android.intent.category.DEFAULT;category=android.intent.category.BROWSABLE;S.onyvvaMessage='.$success['token'].';end';
          header('Location: '.$newURL);
          exit();
      }else{
          return response()->json(['success'=>$success],200)->header('code',$success['token']);
      }


    }

    public function home(){
        $user = Auth::user();

        if(!$user){
            return view('index');
        }
        elseif (!$user->active){
            return view('notActive');
        }
        elseif($user -> type == INFLUENCER){

            $offers = app('App\Http\Controllers\OfferController')->showOffers();
            if(! $offers){
                return error(500);
            }
            return view('influencerhome',compact('offers'));
        }
        elseif($user->type == BUSINESS){
            $showMyOffers = app('App\Http\Controllers\OfferController')->showMyOffers();
            if(! $showMyOffers){
                return abort(500);
            }
            return $showMyOffers;
        }
    }
}
