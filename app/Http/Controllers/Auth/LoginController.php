<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\User;
use App\Influencer;
use Auth;
define('HOSTNAME',env('APP_URL').':'.env('APP_PORT'));
define("BUSINESS",1);
define("INFLUENCER",2);
define("ADMIN",3);
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers{
      username as username;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // instagram login for invluencers
    public function username(){
        return 'username';
    }
    public function redirectToInstagram(){
      return redirect('https://api.instagram.com/oauth/authorize/?client_id='.env('insta_client_id').'&redirect_uri='.HOSTNAME.'/influencerLogin&response_type=code&scope=basic+comments+relationships+likes+follower_list');
    }
    public function influencerLogin(Request $request){
        $client = new Client(); //GuzzleHttp\Client
        $result = $client->post('https://api.instagram.com/oauth/access_token', [
            'form_params' => [
                'client_id'=>env('insta_client_id'),
                'client_secret' => env('insta_client_secret'),
                'grant_type'=>'authorization_code',
                'redirect_uri'=>HOSTNAME.'/influencerLogin',
                'code'=>$request->query('code'),
            ]
        ]);
        $info = json_decode($result->getBody());
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
        Auth::login($user);
        return redirect('/home');


    }
}
