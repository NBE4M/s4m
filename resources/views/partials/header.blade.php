 <!-- #header -->
  <style type="text/css">
    
    .blnk{
            animation-duration: 1s;
            animation-iteration-count: infinite;
            animation-direction: alternate;
            animation-timing-function: linear;
}
            .blnk{
            animation-name: anim-half; 
            animation-timing-function: ease-in-out;
      
}
           
            @keyframes  anim-half {
            50% {
                       
                        
                        color:#c34444;
            }
}
      
    </style>
   
<section id="main">
  <header id="header">
    <div class="container-fluid">
      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="{{url('/')}}">Home</a></li>
          <li><a href="{{url('/category')}}">CATEGORIES </a></li>
          <li class="menu-has-children"><a href="javascript:void(0)">Submission Guidelines</a>
            <ul>
              <li><a href="{{url('/judgecriteria')}}">JUDGING CRITERIA </a></li>
              <li><a href="{{url('/rules')}}">RULES & REGULATION </a></li>
            </ul>
          </li>
          <li><a href="{{url('/jury')}}">JURY</a></li>
          <li><a href="{{url('/onlinejury')}}">ONLINE JURY </a></li>
          <li><a href="{{url('/speaker')}}">SPEAKERS </a></li>
          <li><a href="{{url('/agenda')}}">AGENDA</a></li>
          <li><a href="{{url('/partners')}}">PARTNERS</a></li>
          <li><a href="{{url('/gallery')}}">IDMA GALLERY</a></li>
          
          <?php 
if (!Auth::guest()){
if(Auth::user()->role == 'admin'){
  $durl = url('/admin');
  $url = '/admin';
}elseif(Auth::user()->role == 'jury'){
  $durl = url('/judge');
  $url = '/judge';
}else{
  $durl = url('/dashboard');
  $url = '/dashboard';
}}?> 

           @if (Auth::guest())
          <li><a href="https://e4mevents.com/idma-2018/public/shortlist.html
" class="delegate">IDMA  2018 Finalists</a>
           <!--  <ul>
             
              <li><a href="{{url('/register')}}">Registration</a></li>
              <li><a data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Login</a></li> -->
           
          
          </li>@else
          <li class="menu-has-children"><a href="{{ url($url) }}" class="registration1"> Dashboard </a>
            <ul>
              <li><a href="{{ url($url) }}">{{ Auth::user()->email }}</a></li>
              <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  Logout
                  </a>  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    <input type="hidden" value="{{$url}}" name="typeurl">
                  {{ csrf_field() }}
                  </form>  </li>
            </ul>
          </li>
                  <!--  <li class="menu-has-children"><a href="{{ url($url) }}" class="registration1"> Dashboard </a></li>
                  <li><a href="{{ url('/logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  Logout
                  </a></li>
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  </form>   -->
                  @endif
         
          <!--  <li><a href="{{ url('/delegate') }}" class="delegate">Delegate Registration</a></li> -->
          <li class="menu-has-children"><a href="https://e4mevents.com/idma-2018/public/idma-winners2018.html" class="registration1 blnk" style="font-weight: bold;
    font-size: 14px;background: #000000 !important;">Winners IDMA 2018</a></li>
           <!--  <li><a href="https://e4mevents.com/idma-2018/public/idma-delegate.html" class="delegate">Delegate Registration</a></li> -->
             

      </ul>
    </nav>
      <!-- #nav-menu-container --> 
    </div>
  </header>
<div class="col-md-12 col-xs-12">
<div class="container">
<div class="row">
<div class="col-md-4 col-xs-12 top50">
<div class="mrow ct">
     <?php 
if (!Auth::guest()){
if(Auth::user()->role == 'admin'){
  $durl = url('/admin');
}elseif(Auth::user()->role == 'jury'){
  $durl = url('/judge');
}else{
  $durl = url('/dashboard');
}}?> 
<!-- @if (Auth::guest())
                <a href="{{url('/register')}}" class="button">AWARD REGISTRATION</a> <a href="{{url('/login')}}" class="button">LOGIN</a>  
    @endif -->
  </div>
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
