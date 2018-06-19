
<!DOCTYPE html>
<html lang="en" dir="rtl">

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/fontiran.css')}}">
  <link rel="stylesheet" href="{{asset('css/jquery.scrolling-tabs.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/circle.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('css/owl.theme.default.css')}}">
  <link type="text/css" rel="stylesheet" href="{{asset('css/persianDatepicker-default.css')}}" />
  <link rel="stylesheet" href="{{asset('css/custom.css')}}">
  <title></title>
</head>

<body>
  @if(Auth::user()->type == 1)
  <header class="mk-header-2">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">

      <a class="navbar-brand" href="/"> <img src="{{asset('img/onyva.png')}}" alt=""> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <form class="" action="{{url('/logout')}}" method="post">
              {{ csrf_field() }}
              <input type="submit" name="" value="خروج">
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/editBusinessProfile">پروفایل<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/home">پیشنهادات شما<span class="sr-only">(current)</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{url('/newOffer')}}">ثبت پیشنهاد جدید</a>
          </li>
          <li class="nav-item mk-drop">
              <div class="dropdown">
                <a class=" dropdown-toggle nav-link"  data-toggle="dropdown">صورت حساب</a>
                <ul class="dropdown-menu">
                  <li><a href="/increaseCredit">افزایش اعتبار</a></li>
                  <li><a href="/financialReport">گزارشات مالی</a></li>
                </ul>
              </div>
          </li>
        </ul>
      </div>
    </div>

    </nav>
  </header>
  @elseif(Auth::user()->type == 2)
  <header class="mk-header-2">
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">

      <a class="navbar-brand" href="/"> <img src="{{asset('img/onyva.png')}}" alt=""> </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <form class="" action="{{url('/logout')}}" method="post">
              {{ csrf_field() }}
              <input type="submit" name="" value="خروج">
            </form>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/influencerProfile">پروفایل من<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/history">گذشته من در انیوا</a>
          </li>
        </ul>
      </div>
    </div>

    </nav>
  </header>
  @endif
  @yield('main')


  <footer class="footer">
    <section class="section">
      <div class="container">
        <div class="row justify-content-center">
          <ul class="mk-single-social">
            <li> <a href="#" class="surati"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
            <li> <a href="#" class="surati"> <i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
            <li> <a href="#" class="surati mk-smallest-social"><i class="fa fa-paper-plane" aria-hidden="true"></i></a> </li>
          </ul>
        </div>
      </div>
    </section>
  <section class="section bottom-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center pt-4 pb-1">
          <h5>دوستاتون رو به انیوا دعوت کنین</h5>
          <br>
        </div>
      </div>
    </div>
  </section>
  </footer>

  <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.scrolling-tabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/persianDatepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.scrolling-tabs.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
  </body>

  </html>
