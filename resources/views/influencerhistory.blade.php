@extends('layouts.header')
@section('main')
    <section class="section">
        <div class="container-fluid">
            <div class="row mr-tab-border">

                <ul class="nav nav-tabs  w-100">
                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#home" class="active show">همه</a></li>
                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#menu1">کافه</a></li>
                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#menu2">رستوران</a></li>
                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#menu3">زیبایی و آرایشی</a></li>

                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#home" class="active show">همه</a></li>
                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#menu1">کافه</a></li>
                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#menu2">رستوران</a></li>
                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#menu3">زیبایی و آرایشی</a></li>

                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#home" class="active show">همه</a></li>
                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#menu1">کافه</a></li>
                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#menu2">رستوران</a></li>
                    <li class="pl-5 pt-3 pb-3" role="presentation"><a data-toggle="tab" role="tab" href="#menu3">زیبایی و آرایشی</a></li>


                </ul>
            </div>

            <section class="section">
                <div class="container">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-11 mt-5">
                            <div class="inner-div-type-3 flex">
                                <div class="pull-right text-center pr-4">
                                    <h4>راهنمای ارسال پست در اینستاگرام</h4>
                                    <p>جهت به اشتراک گداری خاطره خود به عنوان پست اینستاگرام باید آیدی اُنیوا (@getonyva) را در تصویر خود تگ کنید</p>
                                </div>
                                <img src="img/q.png" alt="" class="pl-5">
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <div class="tab-content">
                <div role="tabpanel" id="home" class="mt-5 tab-pane fade in active show">
                    <div class="container">
                        <div class="row">

                            @foreach($reservations as $reservation)
                                <?php

                                ?>
                                <div class="col-lg-4 col-md-6 col-sm-12 pb-4">
                                    <div class="mr-offer-box w-80 m-auto">

                                        <img src="{{asset($reservation->picture_url)}}" class="img-fluid" alt="">
                                        <div class="pt-3 pb-3 pr-4 text-right">
                                            <span class="ml-5 mr-offer-box-title">مشخصات پیشنهاد</span>
                                            <span class="mr-offer-box-detail">{{$reservation -> title}}</span>
                                        </div>
                                        <div class="pt-3 pb-3 pr-4 text-right">
                                            <span class="ml-5 mr-offer-box-title align-top">تاریخ</span>
                                            <span class="mr-offer-box-detail"><span class="d-block">{{ $reservation -> time }}</span></span>
                                        </div>
                                        <div class="pt-3 pb-3 pr-4 text-right">
                                            <span class="ml-5 mr-offer-box-title align-middle">زمان</span>
                                            <span class="mr-offer-box-detail"><span>{{ $reservation -> date }}</span><span class="oniva-color"></span>
                                        </div>
                                        <div class="w-100 text-center pt-3 pb-3">
                                            {{--<button type="button" name="button" class="m-auto btn btn-light oniva-color mk-btn">رزرو</button>--}}
                                            <div class="c100 p37 small mr-rate-circle">
                                                <span>37%</span>
                                                <div class="slice">
                                                    <div class="bar"></div>
                                                    <div class="fill"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                        <div class="col-sm-12 mt-5 mb-5">
                            <nav aria-label="Page navigation example ">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item">
                                        <a class="page-link mk-arrow" href="#" aria-label="Previous">
                                            <span aria-hidden="true"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                    </li>
                                    <li class="page-item mk-number-pagination"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item">
                                        <a class="page-link mk-arrow" href="#" aria-label="Next">
                                            <span aria-hidden="true"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>










                    </div>
                </div>
            </div>
            <div role="tabpanel" id="menu1" class="mt-5 tab-pane fade">
                <h3>Menu 1</h3>
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div role="tabpanel" id="menu2" class="mt-5 tab-pane fade">
                <h3>Menu 2</h3>
                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
            <div role="tabpanel" id="menu3" class="mt-5 tab-pane fade">
                <h3>Menu 3</h3>
                <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
            </div>
        </div>
        </div>
        </div>
    </section>

@stop
