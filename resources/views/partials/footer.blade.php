<!--==========================
    Footer
  ============================-->
<footer id="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="copyright text-left"> &copy; 2018 exchange4media. All Rights Reserved. </div>
      </div>
      <div class="col-md-8">
        <div class="footer-menu pull-right">
          <ul>


            <li><a href="http://events.exchange4media.com/idma-2017/case-studies.html" target="_blank">WINNING CASETUDIES 2017</a></li>
              <li><a href="http://events.exchange4media.com/idma-2017/home.aspx" target="_blank">IDMA 2017</a></li>
             <li><a href="http://events.exchange4media.com/idma-2017/IDMAWinners2017.aspx" target="_blank">WINNERS 2017</a></li>
            <li><a href="{{url('/gallery')}}">GALLERY 2017</a> </li>
            <li><a href="{{url('contactus')}}">CONTACT US</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- #footer --> 

<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade login" id="loginModal">
  <div class="modal-dialog login animated">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div class="modal-title">Login </div>
      </div>
      <div class="modal-body">
        <div class="box">
          <div class="content-modal">
             @if ($errors->has('email'))
            <div class="error" style="border-left-color: #2ecc71;height: auto;
    opacity: 1;
    padding: 10px 20px 10px 17px;display: block!important;">{{ $errors->first('email') }}</div>
              @endif
            <div class="form loginBox">
              <form method="post" action="{{route('login')}}" accept-charset="UTF-8">
                 {{ csrf_field() }}
                <input id="email" class="form-control" type="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                             
                             
              <input id="password" type="password" class="form-control" name="password" required placeholder="Password" style="margin-top: 16px;">

                               
                <input class="btn btn-default btn-login" type="submit" value="Login" >
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <div class="forgot login-footer"> <span>Looking to <a href="{{url('/register')}}">create an account</a> ?</span> <a  href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a></div>
        <div class="forgot register-footer" style="display:none"> <span>Already have an account?</span> <a href="javascript: showLoginForm();">Login</a> </div>
      </div> -->
    </div>
  </div>
</div>
<!-- END # MODAL LOGIN --> 


<!-- JavaScript Libraries -->
<script src="{{ url('public/js/jquery.min.js') }}"></script>
  <script src="{{ url('public/js/bootstrap.min.js') }}"></script>
  <script src="{{ url('public/js/superfish.min.js') }}"></script>
  <script src="{{ url('public/js/wow.min.js') }}"></script>
  <script src="{{ url('public/js/owl.carousel.min.js') }}"></script>
  <!-- Template Main Javascript File -->
  <script src="{{ url('public/js/main.js') }}"></script>
    
    <script type="text/javascript"> 
    $(document).ready(function(){
        $("#testimonial-slider").owlCarousel({
            items:1,
            itemsDesktop:[1024,1],
            itemsDesktopSmall:[990,1],
            itemsTablet:[768,1],
            pagination:true,
            navigation:false,
            navigationText:["",""],
            slideSpeed:1000,
            autoPlay:true
        });
    });
    </script>
  @if ($errors->has('password'))
      <script>
        $('#loginModal').modal('show');
      </script>         
    @endif 
    @if ($errors->has('email'))
       <script>
        $('#loginModal').modal('show');
      </script>                  
    @endif  
 <script src="{{ url('public/js/login-register.js') }}" type="text/javascript"></script>
 <script src="{{ url('public/js/jquery.gallery.min.js') }}"></script>
	<script>
		$(function(){
			
			$('.gthumbnail').viewbox();
			$('.gthumbnail-2').viewbox();

			(function(){
				var vb = $('.popup-link').viewbox();
				$('.popup-open-button').click(function(){
					vb.trigger('viewbox.open');
				});
				$('.close-button').click(function(){
					vb.trigger('viewbox.close');
				});
			})();
			
		});
	</script>
</body>
</html>