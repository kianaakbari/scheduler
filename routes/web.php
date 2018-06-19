<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'UserController@home')->name('home');
Route::get('/home', 'UserController@home');

Auth::routes();
Route::get('/instaLogin','Auth\LoginController@redirectToInstagram');
Route::get('/influencerLogin','Auth\LoginController@influencerLogin');

//Route::get('/showOffers','OfferController@showOffers');
Route::get('/showOffer','OfferController@showOffer');
Route::get('/searchOffers','OfferController@searchOffers');
Route::post('/reserveOffer','OfferController@reserveOffer');

//Route::get('/showMyOffers','OfferController@showMyOffers');
Route::get('/showMyHistory','OfferController@showMyHistory');
Route::post('/removeOffer','OfferController@removeOffer');
Route::post('/cancelReservation','OfferController@cancelReservation');
Route::get('/lastOffers','OfferController@showLastOffers');


Route::get('/showInfluencerProfile','InfluencerController@showProfile');
Route::post('/editInfluencerProfile','InfluencerController@editProfile');

Route::get('/showBusinessProfile','BusinessController@showProfile');
Route::post('/editBusinessProfile','BusinessController@editProfile');
Route::get('/editBusinessProfile','BusinessController@showEditProfile');

//Route::get('/home', 'HomeController@index')->name('home')->middleware('isActive');

//QR code
Route::get('/qrcode','QRController@show')->middleware('auth');
Route::get('test',function(){
  return view('home');
});

//views
Route::get('/notActive',function(){
    return view('notActive');
});

Route::group(['middleware'=>'isActive'],function() {
    Route::get('/newOffer', function () {
        return view('addingoffer');
    });

    Route::get('/financialReport', 'businessController@financialReport');

    Route::get('/influencerProfile', 'influencerController@showProfile');

    Route::get('/increaseCredit', 'businessController@increaseCredit');

    Route::get('/history', 'offerController@showMyHistory');

    Route::post('/makeOffer','OfferController@makeOffer');

    Route::get('/editOffer/{offer}', function (\App\Offer $offer) {
        return view('editingoffer', compact('offer'));
    });
});


Route::get('/policy',function(){
  return view('policy');
});
