@extends('layouts.header')
@section('main')
<section class="section ">
    <div class="container">
        <div class="row mt-5 justify-content-center">
            <div class="col-md-8">
                <div class="inner-div-history-2 pt-4 pb-4 mb-5">
                    <h3 class="text-center mt-3 mb-5">افزایش اعتبار حساب کاربری</h3>
                    <p class="">پرداخت آنلاین از طریق کارت های بانکی عضو شتاب</p>
                </div>
                <div class="inner-div-history-2 text-center pt-4 pb-4 mt-5">
                    <h3 class="surati text-center mt-3 mb-5">اعتبار حساب مسدود شده چیست ؟؟؟</h3>
                    <p class="mb-5 mk-increas">در زمان ثبت پیشنهاد جدید شما باید مبلغی بپردازید که این مبلغ در جهت دعوت از تاثیرگذاران مورد نظر شما می باشد > لذا برای اطمینان از دعوت تاثیرگذاران، مبلغ مورد نظر شما در حسابتان به صورت مسدود شده قرار خواهد گرفت و اگر تاثیرگذار مورد نظر شما دعوتتان را نپذیرفت وجه از حالت مسدود خارج شده و به اعتبار شما افزوده خواهد شد. </p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="inner-div-history-2 pt-4 pb-4 mb-5">
                    <h3 class="text-center surati mt-3 mb-5">موجودی حساب شما</h3>
                    <p class="w-100 mb-4"> <span class="surati pull-right">اعتبار شما:</span> {{$credit}} تومان </p>
                    <p class="w-100"> <span class="surati pull-right">اعتبار مسدود شده:</span> اعتبار مسدود شده ای ندارید </p>
                </div>
                <div class="inner-div-history-2 text-center pt-4 pb-4 mt-5">
                    <h3 class="surati text-center mt-3 mb-5">چرا اعتبار بخرم ؟؟؟</h3>
                    <p class="mk-increas mb-5">حساب خود را شارژ کنید تا از تراکنش های کوچک در صورت حساب های بانکی خود جلوگیری کنید و به صورت خودکار آن ها را پرداخت کنید.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section mk-empty-section">

</section>
@stop
