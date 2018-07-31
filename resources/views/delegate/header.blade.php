 <!DOCTYPE html>
<html lang="en">
  <head>
   <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>OOH 2018 - Out of Home Advertising Awards 2018 by Exchange4media</title>
<meta name="description" content="@yield('desc')" />
<meta name="keywords" content="@yield('keyword')" />
<link rel="stylesheet" href="{{ url('public/css/bootstrap-theme.min.css')}}">
<link rel="stylesheet" href="{{ url('public/css/font-awesome.css')}}">
<link href="css/font-awesome.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Monoton' rel='stylesheet' type='text/css'>


<!-- Latest compiled and minified JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<!-- <script src="{{ url('js/jquery-1.10.0.min.js') }}"></script> -->
<script src="{{ url('public/js/bootstrap.min.js') }}"></script>
   <link rel="stylesheet" href="{{ url('public/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ url('public/css/custom.css') }}" />
 <script src="{{ url('public/js/custom.js') }}"></script>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
  </head>
<body>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
         <li class="active"><a href="{{url('/')}}">Home</a></li>
        <li><a href="{{url('/category')}}">Award Categories</a></li>
        <li><a href="{{url('/rules')}}">Entry Guidelines</a></li>
        <li><a href="{{url('/jury')}}">Jury</a></li>
        <li><a href="{{url('/speaker')}}">Speakers</a></li>
        <li><a href="{{url('/partners')}}">Partners</a></li>
        <li><a href="http://events.exchange4media.com/events/ooh-awards-2017/winners.aspx" target="_blank">Winners 2017</a></li>
        <li><a href="http://events.exchange4media.com/events/ooh-awards-2017/gallery.aspx" target="_blank">Gallery</a></li>
        <li><a href="{{url('/contact')}}">Contact</a></li>
        <li><a href="{{url('/delegate')}}">Delegate Registration</a></li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="col-md-12 col-xs-12">
<div class="container">
<div class="row">
<div class="col-md-4 col-xs-12 top50">
<div class="mrow ct">
     
  </div>
  <div class="mrow top20">
  <p class="tw">#OOHawards<br>
  <img src="{{url('public/img/tw.png')}}"> <img src="{{url('public/img/fb.png')}}">
  </p>
  </div>
</div>
<div class="col-md-4 col-xs-12 text-center mainlogo"><img src="{{url('public/img/logo1.png')}}"><div class="logo"></div>
</div>
<div class="col-md-4 col-xs-12 top50">
 <a class="twitter-timeline"  href="https://twitter.com/hashtag/oohawards" data-widget-id="814800933574115328">#oohawards Tweets</a>
            <script>!function (d, s, id) { var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https'; if (!d.getElementById(id)) { js = d.createElement(s); js.id = id; js.src = p + "://platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs); } }(document, "script", "twitter-wjs");</script>        
</div>


</div>
</div>
</div>
<script type="text/javascript">
$( document ).ready(
    function() {
if (document.URL.indexOf("/home") > -1)
{
    document.getElementById("bkchange").className = "right_con homebg";
}
else if (document.URL.indexOf("category") > -1)
{ 
    document.getElementById("bkchange").className = "right_con categoribg";
    document.getElementById("cat").className = "active";
    document.getElementById("Home").className = "";
}
else if (document.URL.indexOf("Rules") > -1)
{
    document.getElementById("bkchange").className = "right_con rulesbg";
    document.getElementById("Rules").className = "active";
    document.getElementById("Home").className = "";
}
else if (document.URL.indexOf("Jury") > -1)
{
  document.getElementById("Jury").className = "active";
    document.getElementById("bkchange").className = "right_con jurybg";
    document.getElementById("Home").className = "";
}
else if (document.URL.indexOf("Speakers") > -1)
{
  document.getElementById("Speakers").className = "active";
  document.getElementById("Home").className = "";
    document.getElementById("bkchange").className = "right_con speakerbg";
}
else if (document.URL.indexOf("Venue") > -1)
{
  document.getElementById("Venue").className = "active";
  document.getElementById("Home").className = "";
    document.getElementById("bkchange").className = "right_con speakerbg";
}
else if (document.URL.indexOf("Partners") > -1)
{
  document.getElementById("Partners").className = "active";
  document.getElementById("Home").className = "";
    document.getElementById("bkchange").className = "right_con speakerbg";
}else if (document.URL.indexOf("Agenda") > -1)
{
  document.getElementById("Agenda").className = "active";
  document.getElementById("Home").className = "";
    document.getElementById("bkchange").className = "right_con speakerbg";
}
else if (document.URL.indexOf("Contact") > -1)
{
  document.getElementById("Contact").className = "active";
  document.getElementById("Home").className = "";
    document.getElementById("bkchange").className = "right_con speakerbg";
    
}
else if (document.URL.indexOf("makeneftpayment") > -1)
{
    document.getElementById("bkchange").className = "right_con";
}
else if (document.URL.indexOf("makecheckpayment") > -1)
{
    document.getElementById("bkchange").className = "right_con";
}
else if (document.URL.indexOf("paymentoption") > -1)
{
    document.getElementById("bkchange").className = "right_con";
}
else if (document.URL.indexOf("judge") > -1)
{
    document.getElementById("bkchange").className = "right_con";
}
else if (document.URL.indexOf("entry_information") > -1)
{
    document.getElementById("bkchange").className = "right_con";
}
else if (document.URL.indexOf("entry_updation") > -1)
{
    document.getElementById("bkchange").className = "right_con";
}
else if (document.URL.indexOf("top5enrty") > -1)
{
    document.getElementById("bkchange").className = "right_con";
}

else if (document.URL.indexOf("Contact") > -1)
{
    document.getElementById("bkchange").className = "right_con speakerbg";
}});
</script>
</nav>
