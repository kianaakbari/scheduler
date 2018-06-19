@extends('layouts.header')
@section('main')
    <section class="section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-4 text-center">
                    <div class="inner-history-div">
                        <img src="{{asset($influencer->picture_url)}}" alt="">
                    </div>

                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-sm-12 flex flex-wrap">
                    <div class="inner-div-history-2 w-100">
                        <div class="w-30 text-center">
                            <h6 class="surati w-100">آفر های فعلی</h6>
                            <p class="w-100">{{$influencer -> upcomingReservations}}</p>
                        </div>
                        <div class="w-30 text-center">
                            <h6 class="surati w-100">آفرهای انجام شده</h6>
                            <p class="w-100">{{$influencer -> usedReservations}}</p>
                        </div>
                        <div class="w-30 text-center">
                            <h6 class="surati w-100">فالوور ها</h6>
                            <p class="w-100">{{$influencer -> followers}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-9 col-sm-12 mt-4">
                  <form method="post" class="mk-form-offer" action="/editInfluencerProfile">
                    {{csrf_field()}}
                    <div class="inner-div-history-2 row">

                        <div class="col-md-12 col-sm-12 mb-4 p-3">
                            <p><span class="right">نام</span> <span class="surati mr-3"><input class="mk-input-large" name="name" disabled value="{{$influencer -> name}}" type='text'></span> </p>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-4 p-3">
                            <p><span class="right">شماره تلفن</span> <span class="surati mr-3"><input class="mk-input-large" name="phone" type="text" value="{{$influencer -> phone}}" disabled></span> </p>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-4 p-3">
                            <p><span class="right">آیدی اینستاگرام</span> <span class="surati mr-3">{{$influencer -> instagram_username}}</span> </p>
                        </div>
                        <div class="col-md-6 col-sm-12 mb-4 p-3">
                            <p><span class="right">ایمیل</span> <span class="surati mr-3"><input class="mk-input-large" name="email" type="email" value="{{$influencer -> email}}" disabled></span> </p>
                        </div>
                        <div class="col-md-6 col-sm-12 mb- p-3">
                            <p><span class="right">زمینه کاری</span> <span class="surati mr-3">
                              <select class="mk-input-large" name="category">
                                @switch($influencer->category)
                                  @case(1)
                                    <option value="1" selected>ورزش</option>
                                    <option value="2">گردشگری</option>
                                    <option value="3">سبک زندگی</option>
                                    <option value="4">فرهنگ و هنر</option>
                                    <option value="5">کسب و کار</option>
                                    <option value="6">تغذیه</option>
                                    <option value="7">پزشکی</option>
                                    <option value="8">مد و فشن</option>
                                    <option value="9">کمدین</option>
                                    <option value="10">سایر</option>
                                  @break
                                  @case(2)
                                    <option value="1">ورزش</option>
                                    <option value="2" selected>گردشگری</option>
                                    <option value="3">سبک زندگی</option>
                                    <option value="4">فرهنگ و هنر</option>
                                    <option value="5">کسب و کار</option>
                                    <option value="6">تغذیه</option>
                                    <option value="7">پزشکی</option>
                                    <option value="8">مد و فشن</option>
                                    <option value="9">کمدین</option>
                                    <option value="10">سایر</option>
                                  @break
                                  @case(3)
                                    <option value="1">ورزش</option>
                                    <option value="2">گردشگری</option>
                                    <option value="3" selected>سبک زندگی</option>
                                    <option value="4">فرهنگ و هنر</option>
                                    <option value="5">کسب و کار</option>
                                    <option value="6">تغذیه</option>
                                    <option value="7">پزشکی</option>
                                    <option value="8">مد و فشن</option>
                                    <option value="9">کمدین</option>
                                    <option value="10">سایر</option>
                                  @break
                                  @case(4)
                                    <option value="1">ورزش</option>
                                    <option value="2">گردشگری</option>
                                    <option value="3">سبک زندگی</option>
                                    <option value="4" selected>فرهنگ و هنر</option>
                                    <option value="5">کسب و کار</option>
                                    <option value="6">تغذیه</option>
                                    <option value="7">پزشکی</option>
                                    <option value="8">مد و فشن</option>
                                    <option value="9">کمدین</option>
                                    <option value="10">سایر</option>
                                  @break
                                  @case(5)
                                    <option value="1">ورزش</option>
                                    <option value="2">گردشگری</option>
                                    <option value="3">سبک زندگی</option>
                                    <option value="4">فرهنگ و هنر</option>
                                    <option value="5" selected>کسب و کار</option>
                                    <option value="6">تغذیه</option>
                                    <option value="7">پزشکی</option>
                                    <option value="8">مد و فشن</option>
                                    <option value="9">کمدین</option>
                                    <option value="10">سایر</option>
                                  @break
                                  @case(6)
                                    <option value="1">ورزش</option>
                                    <option value="2">گردشگری</option>
                                    <option value="3">سبک زندگی</option>
                                    <option value="4">فرهنگ و هنر</option>
                                    <option value="5">کسب و کار</option>
                                    <option value="6" selected>تغذیه</option>
                                    <option value="7">پزشکی</option>
                                    <option value="8">مد و فشن</option>
                                    <option value="9">کمدین</option>
                                    <option value="10">سایر</option>
                                  @break
                                  @case(7)
                                    <option value="1">ورزش</option>
                                    <option value="2">گردشگری</option>
                                    <option value="3">سبک زندگی</option>
                                    <option value="4">فرهنگ و هنر</option>
                                    <option value="5">کسب و کار</option>
                                    <option value="6">تغذیه</option>
                                    <option value="7" selected>پزشکی</option>
                                    <option value="8">مد و فشن</option>
                                    <option value="9">کمدین</option>
                                    <option value="10">سایر</option>
                                  @break
                                  @case(8)
                                    <option value="1">ورزش</option>
                                    <option value="2">گردشگری</option>
                                    <option value="3">سبک زندگی</option>
                                    <option value="4">فرهنگ و هنر</option>
                                    <option value="5">کسب و کار</option>
                                    <option value="6">تغذیه</option>
                                    <option value="7">پزشکی</option>
                                    <option value="8" selected>مد و فشن</option>
                                    <option value="9">کمدین</option>
                                    <option value="10">سایر</option>
                                  @break
                                  @case(9)
                                    <option value="1">ورزش</option>
                                    <option value="2">گردشگری</option>
                                    <option value="3">سبک زندگی</option>
                                    <option value="4">فرهنگ و هنر</option>
                                    <option value="5">کسب و کار</option>
                                    <option value="6">تغذیه</option>
                                    <option value="7">پزشکی</option>
                                    <option value="8">مد و فشن</option>
                                    <option value="9" selected>کمدین</option>
                                    <option value="10">سایر</option>
                                  @break
                                  @case(10)
                                    <option value="1">ورزش</option>
                                    <option value="2">گردشگری</option>
                                    <option value="3">سبک زندگی</option>
                                    <option value="4">فرهنگ و هنر</option>
                                    <option value="5">کسب و کار</option>
                                    <option value="6">تغذیه</option>
                                    <option value="7">پزشکی</option>
                                    <option value="8">مد و فشن</option>
                                    <option value="9">کمدین</option>
                                    <option value="10" selected>سایر</option>
                                  @break
                                  @default
                                  <option value="1">ورزش</option>
                                  <option value="2">گردشگری</option>
                                  <option value="3">سبک زندگی</option>
                                  <option value="4">فرهنگ و هنر</option>
                                  <option value="5">کسب و کار</option>
                                  <option value="6">تغذیه</option>
                                  <option value="7">پزشکی</option>
                                  <option value="8">مد و فشن</option>
                                  <option value="9">کمدین</option>
                                  <option value="10" >سایر</option>
                                @endswitch



                              </select>
                              </span> </p>
                        </div>
                        <div class="col-lg-6 text-center mb-5">
                            <button id="edit" type="submit" class="mk-btn mk-submit-btn" style="display:none">ویرایش</button>
                        </div>

                    </div>
                      </form>
                    <button onclick="edit()" type="button" name="button" class=" absolute mk-edit-btn border-radius-50"><i class="fa fa-pencil surati" aria-hidden="true"></i></button>
                </div>
            </div>
        </div>
    </section>
    <section class="section mk-empty-section">

    </section>
    <script type="text/javascript">
      function edit(){
        var inputs = document.getElementsByTagName('input');
        var edit = document.getElementById('edit');
        edit.style.display = "inherit";
        for (var i = 0; i < inputs.length; i++) {
          inputs[i].disabled = false;
        }

      }
    </script>
@stop
