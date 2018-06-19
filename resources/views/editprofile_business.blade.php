@extends('layouts.header')
@section('main')

<section class="section">
    <div class="container">
        <div class="row mt-3">
            <form id="upload" class="col-lg-12 mk-form-offer" method="post" enctype="multipart/form-data" action="/editBusinessProfile">
              {{csrf_field()}}
                <div class="inner-div-history-2 row">
                    <h3 class="text-center w-100 pt-3 mb-5">ثبت پیشنهاد جدید</h3>
                    <div class="col-lg-12" style="text-align:center;">
                      <img style="width:150px;height:150px;margin:auto;border-radius:50%; margin-bottom:20px;" src="{{$business->picture_url}}" alt="">
                    </div>


                    <div class="col-lg-6 mb-5">
                        <label for="" class="right">نام کسب و کار</label>
                        <input type="text" name="name" value="{{$business->name}}" placeholder="برای مثال : انیوا" class="mk-input-large">
                    </div>
                    <div class="col-lg-6 mb-5">
                        <label for="" class="right">آدرس</label>
                        <input type="text" name="address" value="{{$business->address}}" placeholder="برای مثال : ولنجک، دانشگاه شهید بهشتی" class="mk-input-large">
                    </div>
                    <div class="col-lg-6 mb-5">
                        <label for="" class="right">پست الکترونیکی</label>
                        <input type="email" name="email" value="{{$business->email}}" placeholder="برای مثال : onyva@gmail.com" class="mk-input-large">
                    </div>
                    <div class="col-lg-6 mb-5">
                        <label for="" class="right"> شماره تلفن همراه </label>
                        <input type="text" name="phone" value="{{$business->phone}}" placeholder=" مثال : 0912xxxxxxx" class="mk-input-large">
                    </div>
                    <div class="col-lg-6 mb-5">
                        <label for="" class="right"> حساب کاربری اینستاگرام </label>
                        <input type="text" name="instagram_account" value="{{$business->instagram_account}}" placeholder="برای مثال : getonyva" class="mk-input-large">
                    </div>
                    <div class="col-lg-6 mb-5">
                        <label for="" class="right"> تصویر لوگو </label>
                        <input type="file" name="photo" value="" class="mk-input-large">
                    </div>
                    <div class="col-md-12 text-center mb-5">
                        <button type="submit" class="mk-btn mk-submit-btn">ویرایش</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


@stop
