@extends('layouts.header')
@section('main')

<section class="section">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 text-center mt-5">
                <h2 class="surati">گزارشات مالی حساب شما</h2>
            </div>
        </div>
        <div class="row mk-padding-account">
            <div class="col-md-6 text-center mk-sub-header">
                <h3 class="mb-5"> <span class="surati ml-4">اعتبار شما:</span> {{$credit}} تومان</h3>
                <p class="mb-5">حساب خود را شارژ کنید تا از تراکنش های کوچک در صورت حساب های بانکی خود جلوگیری کنید و به صورت خودکار آن ها را پرداخت کنید</p>
                <a href="#" class="mk-btn mk-submit-btn">افزایش اعتبار</a>
            </div>
            <div class="col-md-6 text-center  mk-sub-header mk-border-right">
                <h3 class="mb-5"> <span class="surati ml-4">اعتبار مسدود شده:</span> اعتبار مسدود شده ای ندارید</h3>
                <p class="mb-5">در زمان ثبت پیشنهاد جدید شما باید مبلغی بپردازید که این مبلغ در جهت دعوت از تاثیرگذاران مورد نظر شما می باشد <br> لذا برای اطمینان از دعوت تاثیرگذاران، مبلغ مورد نظر شما در حسابتان به صورت مسدود شده قرار خواهد گرفت و اگر تاثیرگذار مورد نظر شما دعوتتان را نپذیرفت وجه از حالت مسدود خارج شده و به اعتبار شما افزوده خواهد شد. </p>
                <a href="#" class="mk-btn mk-submit-btn">ثبت پیشنهاد جدید</a>
            </div>
        </div>
    </div>
</section>
<section class="section">
    <div class="container">
        <div class="row mt-5">
            <div class="col-sm-12 mk-search mt-5">
                <form class="col-4" action="index.html" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend order-2">
                            <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                        <input type="text" class="form-control order-1" placeholder="فیلتر کردن لیست" aria-label="" aria-describedby="basic-addon1">
                    </div>
                </form>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="inner-div-history-2">
                    <table class="table table-hover w-100">
                        <thead>
                        <tr>
                            <th scope="col">شماره پیگیری</th>
                            <th scope="col">مبلغ به تومان</th>
                            <th scope="col">زمان</th>
                            <th scope="col">توضیحات</th>
                            <th scope="col">اعتبار اولیه-اعتبار نهایی</th>
                            <th scope="col">اعتبار مسدود شده اولیه -نهایی</th>
                            <th scope="col">وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            <td>123cds</td>
                            <td>1344000</td>
                            <td>3 دقیقه پیش</td>
                            <td>هدیه انیوا به شما</td>
                            <td>0 تومان</td>
                            <td>1344000</td>
                            <td> <span class="success">موفق</span> </td>

                        </tr>
                        <tr>
                            <td>123cds</td>
                            <td>1344000</td>
                            <td>3 دقیقه پیش</td>
                            <td>هدیه انیوا به شما</td>
                            <td>0 تومان</td>
                            <td>1344000</td>
                            <td> <span class="success">موفق</span> </td>
                        </tr>

                        </tbody>
                    </table>

                    <nav aria-label="Page navigation example">
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
</section>

<section class="section mk-empty-section">

</section>

@stop