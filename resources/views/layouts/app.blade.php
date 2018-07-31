<!DOCTYPE html>
<html lang="en">
  <head>
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>IDMA Awards - Indian Digital Marketing Awards 2018 by Exchange4Media</title>
<meta name="description" content="@yield('desc')" />
<meta name="title" content="@yield('title')" />
<meta name="keywords" content="@yield('keyword')" />
<link rel="stylesheet" href="{{ url('public/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ url('public/css/font-awesome.min.css') }}">
<link href='https://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>

<!-- Latest compiled and minified JavaScript -->
<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->

<!-- <script src="{{ url('public/js/jquery-1.10.0.min.js') }}"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- <script src="{{ url('public/js/bootstrap.min.js') }}"></script> -->
   <link rel="stylesheet" href="{{ url('public/css/animate.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ url('public/css/style.css') }}" />

<!-- <link rel="stylesheet" type="text/css" href="{{ url('public/css/build.css') }}" /> -->
<link rel="stylesheet" type="text/css" href="{{ url('public/css/responsive.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('public/css/gallery.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('public/css/owl.theme.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ url('public/css/owl.carousel.min.css') }}" />
<link rel="shortcut icon" href="{{ url('/public/favicon.png') }}">
 <script src="{{ url('public/js/custom.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>
<body>
<div class="logo_sec">
  <div id="logo">
    <h1><a href="{{url('/')}}" class="scrollto"><img src="{{url('public')}}/img/IDMA_logo.gif" alt=""></a></h1>
    <div class="address">
             June 27, 2018<br>
              Hotel Taj Santacruz<br> Mumbai
</div>
    <div class="social-links"> <a target="_blank" href="https://www.facebook.com/exchange4media/photos/a.210187875683686.45535.117658164936658/1583244918377968/?type=3" class="facebook"><img src="{{url('public')}}/img/fb-icon.png" alt="facebook"></a> <a target="_blank" href="https://twitter.com/e4mevents/status/973479866761756673" class="twitter"><img src="{{url('public')}}/img/twitter-icon.png" alt="twitter"></a> <a href="https://www.linkedin.com/company/61670/admin/updates/" target="_blank" class="facebook"><img src="{{url('public')}}/img/linkedin-icon.png" alt="linkedin"></a>  </div>
    <div class="hashtag">
      <a target="_blank" href="https://twitter.com/hashtag/e4midma?vertical=default&src=hash">#e4mIDMA</a><br>
      <a target="_blank" href="https://twitter.com/hashtag/techmanch?vertical=default&src=hash">#TechManch </a>
    </div>
  </div>
</div>

<!--  Intro Section --> 
@include('partials.header')
@yield('content')
@include('partials.footer')
</body>
</html>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-114328397-1"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());

 gtag('config', 'UA-114328397-1');
</script>