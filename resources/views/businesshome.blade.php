{{--@extends('layouts.header')--}}
{{--@section('main')--}}
  {{--<section class="section">--}}
    {{--<div class="container">--}}
      {{--<div class="row mt-5 justify-content-center">--}}
        {{--<div class="col-md-6 text-center mt-5">--}}
          {{--<h3 class="surati">پیشنهادی یافت نشد!</h3>--}}
          {{--<p class="mb-5">شما هنوز پیشنهادی ثبت نکرده اید.اولین پیشنهاد خود را ثبت کنید و از خدمات اُنیوا استفاده نمایید</p>--}}
          {{--<a href="#" class="mk-btn mk-more-pad">ثبت پیشنهاد جدید</a>--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</div>--}}
  {{--</section>--}}
  {{--<section class="section mk-empty-section">--}}

  {{--</section>--}}
{{--@stop--}}

@extends('layouts.header')

@section('main')

  @if(!$offers)
    <section class="section">
      <div class="container">
        <div class="row mt-5 justify-content-center">
          <div class="col-md-6 text-center mt-5">
            <h3 class="surati">پیشنهادی یافت نشد!</h3>
            <p class="mb-5">شما هنوز پیشنهادی ثبت نکرده اید.اولین پیشنهاد خود را ثبت کنید و از خدمات اُنیوا استفاده نمایید</p>
          </div>
        </div>
      </div>
    </section>
  @endif
  <div class="col-md-12 text-center mt-5" style="color:green">
    اعتبار شما {{ $credit }} تومان است
  </div>
  <div class="col-md-12 text-center mt-5">
    <a href="{{url('/newOffer')}}" class="mr-red-btn surati p-3 pl-4 pr-4" style="width:50%;">ثبت پیشنهاد جدید</a>
  </div>
  @foreach($offers as $offer)

  <?php
//  $start_date = new DateTime($offer->start_date);
//  $start_date = new DateTime($offer->exp_date);
//  $start_date = strtotime( $offer->start_time);
//  $exp_date = strtotime( $offer->exp_time);
  ?>

  <section class="section">
    <div class="container">
      <div class="row mt-5 justify-content-center">
        <div class="col-md-10 text-center mt-5">
          <div class="inner-div-history-2 flex mk-media">
            <div class="mk-box-detaol-media row m-0">
              <div class="col-lg-5 pt-4">
                <span class="pull-right mk-span-title-media">تاریخ</span>
                <p class="pull-left pl-4 mk-p-title-media">
                  {{--FIXME--}}
                  <span class="w-100 ">{{ $offer -> exp_date }}</span>
                  {{--<span class="w-100 ">{{ date("Y/m/d", $exp_date) }}</span>--}}
                  <span class="w-100 ">{{ $offer -> start_date }}</span>
                  {{--<span class="w-100 mb-2 flex">{{ date("Y/m/d", $start_date) }}</span>--}}
                </p>
              </div>
              <div class="col-lg-7 pt-4">
                <span class="pull-right mk-span-title-media">مشخصات پیشنهاد</span>
                <p class="pull-left mk-p-title-media">سفارش تا سقف {{$offer->price}} هزار تومان</p>
              </div>
              <div class="col-lg-5">
                <span class="pull-right mk-span-title-media">زمان</span>
                {{--FIXME--}}
                {{--<p class="pull-left pl-4 mk-p-title-media">11:00 - 23:00</p>--}}
                {{--<p class="pull-left pl-4 mk-p-title-media">{{date('g:i',$exp_date)}}  {{date('g:i',$start_date)}}</p>--}}
                <p class="pull-left pl-4 mk-p-title-media">{{ $offer -> end_time }} - {{ $offer -> start_time }}</p>
              </div>
              <div class="col-lg-7">
                <span class="pull-right mk-span-title-media">تعداد تاثیرگذار</span>
                <p class="pull-left mk-p-title-media">{{ $offer -> numbers }} نفر ( {{ $offer -> escort }} نفر همراه)</p>
              </div>
              <div class="col-md-12 text-center">
                <button type="button" name="button" id = "remove-offer-button" class="surati mk-btn border-0 ml-2" onclick="removeOffer({{$offer->id}})">حدف پیشنهاد</button>

                <button type="button" name="button" class="surati mk-btn border-0 mr-2">
                  <a href={{ url('/editOffer/'.$offer->id) }}>
                  ویرایش پیشنهاد
                  </a>
                </button>
              </div>
            </div>

            <img src="{{asset($offer->picture_url)}}" alt="" class="mk-media-cart">

          </div>
        </div>


      </div>
    </div>
  </section>
  @endforeach

  <section class="section mk-empty-section">

  </section>
  <script type="text/javascript">
    function removeOffer(id){
      $('<form action="/removeOffer" method="post"> {{ csrf_field() }} <input name="id" type="number" value='+id+'> </form>').appendTo(document.body).submit();
    }
  </script>

  @stop
