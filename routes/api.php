<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'auth:api','prefix'=>'v1'],function(){
  Route::get('/showOffers','v1\OfferController@showOffers');
  Route::get('/showOffer','v1\OfferController@showOffer');
  Route::get('/searchOffers','v1\OfferController@searchOffers');
  Route::post('/reserveOffer','v1\OfferController@reserveOffer');
  Route::post('/makeOffer','v1\OfferController@makeOffer');
  Route::get('/showMyOffers','v1\OfferController@showMyOffers');
  Route::get('/showMyHistory','v1\OfferController@showMyHistory');
  Route::post('/removeOffer','v1\OfferController@removeOffer');
  Route::post('/cancelReservation','v1\OfferController@cancelReservation');
  Route::get('/lastOffers','v1\OfferController@showLastOffers');

  Route::post('/consume','v1\OfferController@consume');
  Route::get('/qrcode','QRController@showAPI');

  Route::get('/showInfluencerProfile','v1\InfluencerController@showProfile');
  Route::post('/editInfluencerProfile','v1\InfluencerController@editProfile');

  Route::get('/showBusinessProfile','v1\BusinessController@showProfile');
  Route::post('/editBusinessProfile','v1\BusinessController@editProfile');

  Route::get('/showDiscounts','v1\DiscountController@showDiscounts');
  Route::post('/reserveDiscounts','v1\DiscountController@reserve');

});
Route::group(['prefix'=>'/v1'],function(){
  Route::post('/businessLogin','UserController@businessLogin');
  Route::post('/businessRegister','UserController@businessRegister');
  Route::get('/instaLogin','UserController@redirectToInstagram');
  Route::post('/influencerLogin','UserController@influencerLogin');
  Route::get('/influencerLogin','UserController@influencerLogin');
});
