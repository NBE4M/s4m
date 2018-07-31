@extends('layouts.app')

@section('content')
 <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-2">
                <div class="register-form">  
                 <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="panel-title">Register</div>
                        </div>
                        <div class="panel-body">
                          <form class="form-horizontal" role="form" method="POST" action="{{route('register')}}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                     <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}"">
                                        <label>Title<span class="mandat">*</span></label>
                                       <select name="title" id="title" required autofocus="autofocus" class="selectcountry" >
                            <option value="">Select</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Ms.">Ms.</option>
                           
                </select>

                                          @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                                        
                                    </div>
                                </div>
                             <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"">
                                        <label>First Name<span class="mandat">*</span></label>
                                       <input id="email" type="text"  name="fname" value="{{ old('fname') }}" required class="form-control input-sm">
                                    </div>
                                      @if ($errors->has('fname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fname') }}</strong>
                                    </span>
                                @endif
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}"">
                                        <label>Last Name<span class="mandat">*</span></label>
                                       <input id="email" type="text"  name="lname" value="{{ old('lname') }}" required class="form-control input-sm">
                                    </div>
                                      @if ($errors->has('lname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('lname') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"">
                                        <label>Email Id<span class="mandat">*</span></label>
                                       <input id="email" type="email"  name="email" value="{{ old('email') }}" required class="form-control input-sm">
                                    </div>
                                      @if ($errors->has('email'))
                                        <div class="alert alert-danger">
                                        <strong>Danger!</strong> {{ $errors->first('email') }}
                                        </div>
                                       
                                @endif
                                </div>
                            </div>

                            

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"">
                                        <label>Password<span class="mandat">*</span></label>
                                        <input id="password" type="password" class="form-control input-sm" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}"">
                                        <label>Confirm Password<span class="mandat">*</span></label>
                                         <input id="password-confirm" type="password" class="form-control input-sm" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Designation<span class="mandat">*</span></label>
                                       <input id="designation" type="text" class="form-control input-sm" name="designation" value="{{ old('designation') }}" required>

                                @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Department<span class="mandat">*</span></label>
                                         <input id="department" type="text" class="form-control input-sm" name="department" value="{{ old('department') }}" required>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Company’s Legal Name<span class="mandat">*</span></label>
                                        <input id="organization" type="text" class="form-control input-sm" name="organization" value="{{ old('organization') }}" required>

                                @if ($errors->has('organization'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organization') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Office Landline Number<span class="mandat">*</span></label>
                                        <input type="number" name="" id="" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Mobile<span class="mandat">*</span></label>
                                        <input id="mobile" type="text" class="form-control input-sm" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Company’s Full Address<span class="mandat">*</span></label>
                                        <input id="companyaddress" type="text" class="form-control input-sm" name="companyaddress" value="{{ old('companyaddress') }}" >

                                @if ($errors->has('companyaddress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyaddress') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>City<span class="mandat">*</span></label>
                                        <input id="city" type="text" value="{{ old('city') }}" class="form-control input-sm" name="city" required >

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Pincode<span class="mandat">*</span></label>
                                         <input id="Pincode" type="text" pattern="[1-9][0-9]{5}"  maxlength="6" minlength="6" value="{{ old('Pincode') }}" class="form-control input-sm" name="Pincode" required>

                                @if ($errors->has('Pincode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Pincode') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>GST Identification No<span class="mandat">*</span></label>
                                         <input id="gst" type="text" required value="{{ old('gst') }}" class="form-control input-sm gstinnumber" name="gst" >

                                @if ($errors->has('gst'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gst') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Company’s Twitter Handle<span class="mandat">*</span></label>
                                       <input id="twiterh" type="text" value="{{ old('twiterh') }}" required autofocus="autofocus"  class="form-control input-sm" name="twiterh">

                                @if ($errors->has('twiterh'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twiterh') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Company’s Facebook<span class="mandat">*</span></label>
                                         <input id="Facebook" type="text" value="{{ old('Facebook') }}" required="required" autofocus class="form-control input-sm" name="Facebook">

                                @if ($errors->has('Facebook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Facebook') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>How did you get to know about IDMA 2018?<span class="mandat">*</span></label>
                                        <select name="howtohear" id="howtohear" class="form-control selectcountry" required autofocus>
                            <option value="">Select</option>
                            <option value="e4m Mailer">e4m Mailer</option>
                            <option value="Voice Call from e4m">Voice Call from e4m</option>
                            <option value="Print Ad">Print Ad</option>
                            <option value="Social Media">Social Media</option>
                            <option value="Others">Others</option>
                </select>
                    @if ($errors->has('howtohear'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('howtohear') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="panel-title2">Alternative Contact</div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Title<span class="mandat">*</span></label>
                                         <select name="stitle" id="stitle" class="form-control input-sm" required autofocus>
                            <option value="">Select</option>
                            <option value="Mr.">Mr.</option>
                            <option value="Ms.">Ms.</option>
                           
                </select>
                    @if ($errors->has('stitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stitle') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Name<span class="mandat">*</span></label>
                                        <input id="sname" type="text" class="form-control input-sm" name="sname" value="{{ old('sname') }}" required autofocus>

                                @if ($errors->has('sname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sname') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Designation<span class="mandat">*</span></label>
                                        <input id="sdesignation" type="text" class="form-control input-sm" name="sdesignation" value="{{ old('sdesignation') }}" required>

                                @if ($errors->has('sdesignation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sdesignation') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Office Landline Number<span class="mandat">*</span></label>
                                       <input id="sLandlineno" type="text" class="form-control input-sm" name="sLandlineno" value="{{ old('sLandlineno') }}" required>

                                @if ($errors->has('sLandlineno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sLandlineno') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Mobile<span class="mandat">*</span></label>
                                        <input id="smobile" type="text" class="form-control input-sm snumber" name="smobile" maxlength="12" minlength="10" value="{{ old('smobile') }}" required>

                                @if ($errors->has('smobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('smobile') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>E-Mail Address<span class="mandat">*</span></label>
                                        <input id="semail" type="email" class="form-control input-sm" name="semail" value="{{ old('semail') }}" required>

                                @if ($errors->has('semail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('semail') }}</strong>
                                    </span>
                                @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group mandatory">
                                        <small>Fields marked with <span class="mandat">*</span> are mandatory</small>
                                    </div>
                                </div>
                            </div>
                            
                            <input type="submit" value="REGISTER" class="btn btn-info btn-block btn">
                        
                        </form>
                    </div>
                </div>
                 
                 
                 
               </div>     
            </div>
            </div>  
            
            
            
                
            
            
        </div>
      </section><!-- #intro -->
 
 <script>
  $(document).on('change',".gstinnumber", function(){    
    var inputvalues = $(this).val();
    var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
    
    if (gstinformat.test(inputvalues)) {
     return true;
    } else {
        alert('Please Enter Valid GSTIN Number');
        $(".gstinnumber").val('');
        $(".gstinnumber").focus();
    }
    
});
</script>
<script>
  $(document).on('change',".number", function(){    
    var inputvalues = $(this).val();
   var gstinformat = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
    
    if (gstinformat.test(inputvalues)) {
     return true;
    } else {
        alert('Please Enter Valid Mobile Number');
        $(".number").val('');
        $(".number").focus();
    }
    
});
</script>
<script>
  $(document).on('change',".snumber", function(){    
    var inputvalues = $(this).val();
   var gstinformat = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;  
    
    if (gstinformat.test(inputvalues)) {
     return true;
    } else {
        alert('Please Enter Valid Mobile Number');
        $(".snumber").val('');
        $(".snumber").focus();
    }
    
});
</script>
<style type="text/css">
	input:invalid {
  color: red;
}
</style>
@endsection
