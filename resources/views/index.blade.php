<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/fontiran.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
	<link rel="stylesheet" href="{{asset('css/custom.css')}}">
	<title></title>
</head>

<body>
	@if(count($errors))
	<div class="notif text-right" >
			داده های وارد شده صحیح نمیباشد
			{{$errors}}
	</div>
	@endif

	<header class="mk-header">
		<nav class="navbar navbar-expand-lg navbar-light">
			<div class="container">

				<a class="navbar-brand" href="#"> <img src="{{asset('img/onyva.png')}}" class="logo" alt=""> </a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						@if(!Auth::check())
						<li class="nav-item">
							<a class="nav-link d-inline-block pl-0 mr-cursor" data-toggle="modal" data-target="#myModal" onclick="showModal('signinType')">ورود</a>
							<a class="nav-link d-inline-block mr-cursor" data-toggle="modal" data-target="#myModal" onclick="showModal('signupType')"> / ثبت نام
              </a>
							<span class="sr-only">(current)</span>
						</li>
						@else
						<li class="nav-item">
							<form class="" action="{{url('/logout')}}" method="post">
								{{ csrf_field() }}
								<button type="submit" class="nav-link d-inline-block pl-0 mr-cursor">خروج</button>
							</form>
							<span class="sr-only">(current)</span>
						</li>
						@endif
						<li class="nav-item">
							<a class="nav-link" href="#">چرا انیوا</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">دانلود اپلیکیشن</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">وبلاگ</a>
						</li>
					</ul>
				</div>
			</div>

		</nav>
	</header>
	<section class="section">
		<div class="row">
			<div class="col-sm-12">
				<img src="img/1.jpg" alt="" class="img-fluid mk-image-banner-1">
				<h1 class="mk-header-banner-h1">onyva</h1>
			</div>
		</div>
	</section>
	<section class="section mk-background-1">
		<div class="container">
			<div class="row mk-design-section-inner">
				<div class="col-md-6 text-center mt-5">
					<h1 class="mk-h1">اُنیوا</h1>
					<p>پلتفرمی تخصصی که با چهره های شناخته شده در فضایی تعاملی</p>
					<p>همکاری میکند و فرآیند پیدا کردن با کیفیت ترین سرویس ها و خدمات را </p>
					<p>از بین بهترین گزینه های موجود آسان تر می کند</p>
				</div>
				<div class="col-md-6 text-center mt-5">
					<img src="img/3.png" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</section>
	<section class="section mk-background-2">
		<div class="container">
			<div class="row mk-design-section-inner">
				<div class="col-md-6  text-center mt-5">
					<div class="mk-box mx-auto">
						<h1>استفاده تاثیرگذارها</h1>
						<p>راوی قصه های خود باشید. اُنیوا پلتفرمی است که شمارا تشویق می کند مطابق با سلیقه ی شخصی خود داستان های روزانه تان را تعریف کنید و در کنار آن ازپیشنهادات جدابی که اِنیوا به شما ارائه می دهد استفاده کنید و لذت ببرید.</p>
					</div>
				</div>
				<div class="col-md-6  text-center mt-5">
					<div class="mk-box mx-auto">
						<h1>استفاده کسب و کار ها</h1>
						<p>هرچه برند شما در جامعه شناخته شده تر باشد موفقیت بیشتری در ارائه و فروش محصولات و خدماتتان بدست خواهید آورد. در اِنیوا محیطی فراهم شده است تا با هزینه ای به مراتب کمتر از سایر روش های تبلیغاتی بتوانید محصول و یا دماتتان را توسط افراد تاثیر گذار
							معرفی کنید.</p>
					</div>
				</div>

			</div>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="row justify-content-center row-margin">
				<div class="col-md-4  text-center mb-5">
					<div class="inner-div">
						<div class="image-box">
							<img src="img/discount.png" alt="">
						</div>

						<h3 class="mt-4 mb-5">پیشنهادات مناسب</h3>
						<div class="detail-box">
							<p>کاربران اُنیوا را بر اساس تعداد فالوور های اینستاگرامشان ترغیب کنید</p>
						</div>
					</div>
				</div>
				<div class="col-md-4  text-center mb-5">
					<div class="inner-div">
						<div class="image-box">
							<img src="img/connection.png" alt="">
						</div>
						<h3 class="mt-4 mb-5">شبکه ای منحصر به فرد</h3>
						<div class="detail-box">
							<p>اُنیوا شبکه ای از کاربران است که بسیار با دقت انتخاب شده است. اُنیوا با تعداد اندکی از کسب و کارها تعامل برقرار می کند تا بنواند کیفیت را حفظ کند</p>
						</div>
					</div>
				</div>
				<div class="col-md-4  text-center mb-5">
					<div class="inner-div">
						<div class="image-box">
							<img src="img/user (2).png" alt="">
						</div>
						<h3 class="mt-4 mb-5">بهترین کاربر</h3>
						<div class="detail-box">
							<p>کاربران اُنیوا از بهترین تاثیرگداران در شیکه های اجتماعی هستند که شامل بلاگر ها، عکاس ها، بازیگران و ... هستند</p>
						</div>
					</div>
				</div>
				<div class="col-md-4  text-center mt-5">
					<div class="inner-div mt-5">
						<div class="image-box">
							<img src="img/instagram.png" alt="">
						</div>
						<h3 class="mt-4 mb-5">شبکه های اجتماعی</h3>
						<div class="detail-box">
							<p>محبوبیت بیزینس خود را به کمک پست گزاشتن کاربران اُنیوا از محصول، سرئیس، پیشنهادات شما در شبکه اجتماعی شان افزایش دهید و به سهم بازار مناسبتری که منجر به موفقیت بیزینس شما خواهد شد دسترسی پیدا کنید</p>
						</div>
					</div>
				</div>
				<div class="col-md-4  text-center mt-5">
					<div class="inner-div mt-5">
						<div class="image-box">
							<img src="img/4.png" alt="">
						</div>
						<h3 class="mt-4 mb-5">بازاریابی دهان به دهان</h3>
						<div class="detail-box">
							<p>کاربران اُنیوا از تاثیرگذار ترین افراد در فضاهای اجتماعی هستند که توسط اکثریت دنبال می شوند. ار آنها کمک می خواهیم که راجع به بیزینس شما صحبت کنند و به راحتی توسط اکثریت شنیده شوید</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section mk-background-3">
		<div class="container">
			<div class="row row-pad">
				<div class="col-sm-12 text-center mb-5">
					<div class="inner-div-2">
						<h3 class="mb-4">تاثیرگذارها</h3>
						<p>با استفاده از API های رسمی و غیر رسمی که اینستاگرام در اختیار ما قرار می دهد و همچنین با کمک تکنولوژی به روز و منحصر به فردی که در بهش فنی اُنیوا طراحی شده است ما با تحلیل رفتار شما و بررسی میزان تاثیرگداری که در معرفی کسب و کار های مورد علاقه خود
							دارید شمارا دسته بندی می کنیم و به شما امتیاز می دهیم این امر باعث می شود لزوما تعداد فالوور ملاک دسته بندی و امتیاز دهی تاثیرگذاران نباشد و بتوانیم به طور دقیق و حرفه ای افراد را بر حسب میزان تاثیرگذاریشان مرتب کنیم</p>
					</div>
				</div>
				<div class="col-sm-12 text-center mt-5">
					<div class="inner-div-2">
						<h3 class="mb-4">کسب و کار ها</h3>
						<p>ما در اُنیوا با ابزار های پیشرفته و مبتنی بر تکنولوژی و بر اساس شاخص های آماری و ویژگی های کسب و کار شما تلاش میکنیم تا شما بیشترین بهره وری را در استفاده از پلتفرم اُنیوا بدست آورید</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="section">
		<div class="container">
			<div class="row row-pad">
				<div class="col-md-6 text-center">
					<img class="mobile-pic" src="img/mobile.png" alt="">
					<a href="#" class="mk-link-a-image"> <img src="img/googleplay.png" alt=""> </a>
					<a href="#" class="mk-link-a-image"> <img src="img/bazar.png" alt=""> </a>
				</div>
				<div class="col-md-6 text-center">
					<img class="mobile-pic" src="img/mobile.png" alt="">
					<a href="#" class="mk-link-a-image"> <img src="img/appstore.png" alt=""> </a>
					<a href="#" class="mk-link-a-image"> <img src="img/sibapp.png" alt=""> </a>
				</div>
			</div>
		</div>
	</section>
	<footer class="footer">
		<section class="section mk-footer-back-1">
			<div class="container">
				<div class="row justify-content-center row-pad pb-0">
					<div class="col-md-6 text-center white">
						<h2>عضویت در خبرنامه</h2>
						<p>با عضویت در خبرنامه از رویداد ها و اخبار جدید باخبر شوید</p>
						<form class="mk-input-footer mt-5">
							<input type="email" name="" value="" placeholder="ایمیل شما">
							<button type="button" name="button" class="mr-3">عضویت</button>
						</form>
					</div>
				</div>
				<div class="row justify-content-center mt-5 pb-5">
					<div class="col-md-12 text-center social pb-5">
						<ul>
							<li> <a href="#" class="twiter"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
							<li> <a href="https://instagram.com/getonyva" class="instagram"> <i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
							<li> <a href="https://t.me/getonyva" class="telegram"><i class="fa fa-paper-plane" aria-hidden="true"></i></a> </li>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<section class="section bottom-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center pt-4 pb-1">
						<h5>© 2018 ONYVA ALL RIGHTS RESERVED</h5>
					</div>
				</div>
			</div>
		</section>
	</footer>



	<!-- signup -->

	<div id="myModal" class="modal fade" role="dialog">
		<div class="modal-dialog">

			<!-- signupType -->

			<div class="modal-content" id="signupType">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="m-auto pt-4">ثبت نام</h3>
				</div>
				<div class="modal-body">
					<div class="text-center">

						<button type="button" name="button" class="mr-red-btn w-60"> <a href="{{url('/instaLogin')}}"> تاثیرگذار هستم</a> </button>
						<button type="button" name="button" class="mr-black-btn w-60" onclick="showModal('signup')">بیزنس دارم</button>
					</div>
				</div>
				<div class="modal-footer">
				</div>
			</div>



			<!-- signintype -->


			<div class="modal-content" id="signinType">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="m-auto pt-4">ورود</h3>
				</div>
				<div class="modal-body">
					<div class="text-center">

						<button type="button" name="button" class="mr-red-btn w-60 mr-cursor"> <a href="{{url('/instaLogin')}}"> تاثیرگذار هستم</a> </button>
						<button type="button" name="button" class="mr-black-btn w-60 mr-cursor" onclick="showModal('signin')"> بیزنس دارم </button>
					</div>
				</div>
				<div class="modal-footer">
				</div>
			</div>

			<!-- sigin -->
			<div class="modal-content" id="signin">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="m-auto pt-4">ورود مدیران</h3>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<form class="text-center m-auto" action="{{url('/login')}}" method="post">
							{{ csrf_field() }}
							<label for="username" class="d-block">
								نام کاربری
							</label>
							<input type="text" name="username" value="" class="d-block m-auto w-75 mr-modal-input">
							<label for="password" class="d-block mt-4">
								رمزعبور
							</label>
							<input type="password" name="password" value="" class="d-block m-auto w-75 mr-modal-input">
							<button type="submit" name="button" class="mr-red-btn mt-4 w-25">ورود</button>
						</form>

					</div>
				</div>
				<div class="modal-footer">
					<div class="w-75 m-auto text-center">
						<a class="oniva-color text-right float-right mr-cursor" onclick="showModal('forgetPass')">رمزعبورم را فراموش کرده‌ام</a>
						<span>|</span>
						<a class="oniva-color text-left float-left mr-cursor" onclick="showModal('signup')">هنوز ثبت ‌نام نکرده‌ام</a>
					</div>

				</div>
			</div>



			<!-- forgetPass -->

			<div class="modal-content" id="forgetPass">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="m-auto pt-4"></h3>
				</div>
				<div class="modal-body">
					<div class="text-center">
						<form class="" action="{{route('password.email')}}" method="post">
							{{ csrf_field() }}
							<label for="email" class="d-block">ایمیل خود را وارد کنید</label>
							<input type="text" name="email" value="" class="d-block m-auto w-75 mr-modal-input">
							<button type="submit" name="button" class="mr-red-btn mt-4 w-25">تایید</button>
						</form>
					</div>
				</div>
				<div class="modal-footer">

				</div>
			</div>



			<!-- signup -->

			<div class="modal-content" id="signup">
				<div class="modal-header text-center">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="m-auto pt-4">ثبت‌نام مدیران</h3>
				</div>
				<div class="modal-body">
					<div class="m-auto">
						<form class="pt-2" action="{{route('register')}}" method="post">
							{{ csrf_field() }}
							<div class="">
								<div class="">
									<span class="d-inline-block mr-w-45 float-right mr-m-20">
									<label for="" class="d-block text-center">
										نام کسب و کار
									<span class="oniva-color">*</span>
									</label>
									<input type="text" name="name" value="" class="mr-modal-input d-block w-100">
									</span>
									@if ($errors->has('name'))
											<span class="invalid-feedback">
													<strong>{{ $errors->first('name') }}</strong>
											</span>
									@endif
									<span class="d-inline-block mr-w-45 float-left mr-m-20">
									<label for="" class="d-block text-center">
										شماره همراه
										<span class="oniva-color">*</span>
									</label>
									<input type="text" name="phone" value="" class="mr-modal-input d-block w-100">
									</span>
									@if ($errors->has('phone'))
											<span class="invalid-feedback">
													<strong>{{ $errors->first('phone') }}</strong>
											</span>
									@endif
								</div>

								<div class="">
									<span class="d-inline-block w-100 mr-m-20">
									<label for="" class="d-block text-center">
										آدرس کسب و کار
									</label>
									<input type="text" name="address" value="" class="mr-modal-input d-block w-100">
									</span>
									@if ($errors->has('address'))
											<span class="invalid-feedback">
													<strong>{{ $errors->first('address') }}</strong>
											</span>
									@endif
								</div>

								<div class="">
									<span class="d-inline-block mr-w-45 float-right mr-m-20">
									<label for="" class="d-block text-center">
										آدرس وبسایت
								</label>
								<input type="text" name="website" value="" class="mr-modal-input d-block w-100">
								</span>
									<span class="d-inline-block mr-w-45 float-left mr-m-20">
										@if ($errors->has('website'))
												<span class="invalid-feedback">
														<strong>{{ $errors->first('website') }}</strong>
												</span>
										@endif
									<label for="" class="d-block text-center">
										نام‌کاربری اینستاگرام
										<span class="oniva-color">*</span>
									</label>
									<input type="text" name="instagram_account" value="" class="mr-modal-input d-block w-100">
									</span>
									@if ($errors->has('instagram_account'))
											<span class="invalid-feedback">
													<strong>{{ $errors->first('instagram_account') }}</strong>
											</span>
									@endif
								</div>


								<div class="">
									<span class="d-inline-block mr-w-45 float-right mr-m-20">
									<label for="" class="d-block text-center">
										نام کاربری
										<span class="oniva-color">*</span>
									</label>
									<input type="text" name="username" value="" class="mr-modal-input d-block w-100">
									</span>
									<span class="d-inline-block mr-w-45 float-left mr-m-20">
										@if ($errors->has('username'))
												<span class="invalid-feedback">
														<strong>{{ $errors->first('username') }}</strong>
												</span>
										@endif
									<label for="" class="d-block text-center">
										رمز عبور
										<span class="oniva-color">*</span>
									</label>
									<input type="password" name="password" value="" class="mr-modal-input d-block w-100">
									@if ($errors->has('password'))
											<span class="invalid-feedback">
													<strong>{{ $errors->first('password') }}</strong>
											</span>
									@endif
									</span>
								</div>

								<div class="">
									<span class="d-inline-block mr-w-45 float-right mr-m-20">
									<label for="" class="d-block text-center">
										ایمیل

								</label>
								<input type="text" name="email" value="" class="mr-modal-input d-block w-100">
								</span>
									<span class="d-inline-block mr-w-45 float-left mr-m-20">
										@if ($errors->has('email'))
												<span class="invalid-feedback">
														<strong>{{ $errors->first('email') }}</strong>
												</span>
										@endif
									<label for="" class="d-block text-center">
										کد معرف
								</label>
							<input type="text" name="" value="" class="mr-modal-input d-block w-100">
								</span>
								</div>
							</div>
							<div class="d-block w-100 text-center mr-m-20">
								<button type="submit" name="button" class="mr-red-btn w-25 d-inline">ثبت نام</button>
							</div>
						</form>
					</div>
				</div>
				<div class="modal-footer">

				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
</body>

</html>
