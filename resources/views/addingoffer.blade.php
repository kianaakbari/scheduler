@extends('layouts.header')
@section('main')

{{--<section class="section background-color-account">--}}
    {{--<div class="container">--}}
        {{--<div class="row mk-padding-account">--}}
            {{--<div class="col-md-9 text-center">--}}
                {{--<h3 class="surati mb-5">متاسفانه حساب شما هنوز تایید نشده است</h3>--}}
                {{--<p class="mb-5">اُنیوا جهت بررسی صحت اطلاعات کاربران قبل از هرگونه عملیاتی اقدام به بررسی اطلاعات کسب کار ها و تاثیر گدار ها می ماید تا در محیطی قابل اطمینان تعاملات بین کسب و کار ها صورت می پذیرد</p>--}}
                {{--<a href="#" class="mk-btn surati ">تماس با پشتیبانی</a>--}}
            {{--</div>--}}
            {{--<div class="col-md-3">--}}
                {{--<div class="mk-account-pic">--}}
                    {{--<img src="img/user (3).png" alt="">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}
<section class="section">
    <div class="container">
        <div class="row mt-3">
            <form id="upload" class="col-lg-8 mk-form-offer" method="post" enctype="multipart/form-data" action="/makeOffer">
              {{csrf_field()}}
                <div class="inner-div-history-2 row">
                    <h3 class="text-center w-100 pt-3 mb-5">ثبت پیشنهاد جدید</h3>
                    <div class="col-lg-12 mb-5">
                        <label for="" class="right">مشخصات پیشنهاد</label>
                        <input type="text" name="title" value="" placeholder="برای مثال: یک فنجان قهوه" class="mk-input-large">
                    </div>
                    <div class="col-lg-6 mb-5">
                        <label for="">تعداد تاثیرگذاران</label>
                        <div class="quantity">
                            <input type="number" name="numbers" value="" placeholder="برای مثال 10">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <label for="">تعداد همراه هر تاثیرگذار</label>
                        <div class="quantity">
                            <input type="number" name="escort" value=""  placeholder="برای مثال 10">
                        </div>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <label for="">تاریخ شروع پذیرش</label>
                        <input type="text" id="input1" name="start_date" placeholder="روز / ماه / سال"/ class="mk-input-date">
                        <span id="span1"></span>
                    </div>
                    <div class="col-lg-6 mb-5">
                        <label for="">تاریخ پایان پذیرش</label>
                        <input type="text" id="input1" name="exp_date" placeholder="روز / ماه / سال"/ class="mk-input-date">
                        <span id="span1"></span>
                    </div>
                    <div class="col-lg-6 mb-5 flex">
                        <label for="">زمان ارائه خدمات</label>
                        <input type="time" name="start_time" placeholder="17:00:00" class="without_ampm" step="2">
                        تا
                        <input type="time" name="end_time" placeholder="23:45:00" class="without_ampm" step="2">
                    </div>
                    <div class="col-lg-6 mb-5">
                        <label for="">ارزش پیشنهاد به تومان</label>
                        <div class="quantity">
                          <input type="number" name="price" value="" placeholder="برای مثال ۵۰۰۰۰">
                        </div>
                    </div>
                    <div class="col-md-12 mb-5 text-center">
                        <label for="">دسته بندی</label>
                        <div class="quantity">
                          <select class="" name="category">
                            <option value="1">ورزشی</option>
                            <option value="2">رستوران</option>
                            <option value="3">فرهنگی هنری</option>
                            <option value="4">کافه</option>
                            <option value="5">آرایشی بهداشتی</option>
                          </select>
                        </div>
                    </div>
                    <div class="col-md-12 mb-5 text-center">
                        <label for="" class="w-100">تصاویر مربوط به پیشنهاد</label>
                        <div class="input-file-container">
                            <input class="input-file" id="my-file" type="file" multiple="" name="photos[]">
                            <label tabindex="0" for="my-file" class="input-file-trigger">اضافه کردن عکس</label>
                        </div>
                        <p class="file-return"></p>
                    </div>
                    <div class="col-md-12 text-center mb-5">
                        <button type="submit" name="button" class="mk-btn mk-submit-btn">ثبت پیشنهاد</button>
                    </div>
                </div>
            </form>
            <div class="col-lg-4 text-center mk-offer mt-3">
                <div class="inner-div-history-2">
                    <h3 class="surati mb-5">راهنمای ثبت پیشنهاد</h3>
                    <br>
                    <h4 class="surati">مشخصات پیشنهاد</h4>
                    <p>در این قسمت، سرویسی که کسب و کار شما به تاثیرگذار ارائه می دهد را باید وارد نمایید</p>
                    <p>٭توجه نمایید که سرویس ارائه شده نباید با مشخصات درج شده تفاوتی داشته باشد.</p>
                    <p>٭توجه نمایید که مشخصات پیشنهاد شما برای تاثیرگذار قابل رویت می باشد و این توضیح مختصر شماست که تاثیرگذار را ترغیب می کند از سرویس پیشنهادی شما استفاده کند.</p>
                    <br>
                    <h4 class="surati">تعداد تاثیرگذاران و همراهان هر یک</h4>
                    <p>شما می توانید مشخص کنید که این پیشنهاد شما برای چند تاثیرگذار باشد. از طرفی به همراه هر تاثیرگذار چند نفر به صورت رایگان می توانند از سرویس مشابه ثبت شده در گام قبلی استفاده نماید</p>
                    <br>
                    <h4 class="surati">ثبت شروع و پایان و زمان پذیرش</h4>
                    <p>در بازه انتخابی شما، ما از تاثیرگذاران دعوت می کنیم که از پیشنهاد شما استفاده کنند.</p>
                    <br>
                    <h4 class="surati">ارزش پیشنهاد شما</h4>
                    <p>تاثیرگذاران ما باید بدانند که چه پیشنهادات با ارزشی را می خواهند قبول کنند. با ارزش گذاری پیشنهاد خود ارزش پیشنهادتان را مشخص کنید.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- <script type="text/javascript">
  var form = document.getElementById('upload');
  var request = new XMLHttpRequest();
  form.addEventListener('submit',function(e){
    console.log("hey");
    e.preventDefault();
    var formData = new FormData(form);
    request.open('post','/makeOffer');
    request.addEventListener('load',transferComplete);
    request.send(formData);

  });
  function transferComplete(data){
    console.log(data.currentTarget.response);
  }

</script> -->

<!-- <section class="section mk-empty-section">

</section> -->

@stop
