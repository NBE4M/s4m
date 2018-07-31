   
@extends('layouts.app')
@section('title')
  Speakers: OOH AWARDS 2018 by Exchange4Media
@stop

@section('content')

    
    
    <div class="col-md-12 col-xs-12 bgbottom">
    <div class="container bcw">
    <div class="col-md-12 col-xs-12">
    <div class="row">
<h2 class="title">REGISTRATION</h2>
    </div>
    
    <div class="row cw">
    <div class="form-horizontal">
    <div class="col-md-12 form_sub_hed">
      Primary Details:
      </div>
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('auth/register') }}">
                        {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <select name="title" value="{{ old('title') }}" id="title" class="form-control" required autofocus>
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

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">User Name <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">Designation <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control" name="designation" value="{{ old('designation') }}" required>

                                @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                          <div class="form-group{{ $errors->has('department') ? ' has-error' : '' }}">
                            <label for="department" class="col-md-4 control-label">Department <span style="color: red;">*</span> </label>

                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control" name="department" value="{{ old('department') }}" required>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('companylegalname') ? ' has-error' : '' }}">
                            <label for="companylegalname" class="col-md-4 control-label">Company’s Legal Name  <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="companylegalname" type="text" class="form-control" name="companylegalname" value="{{ old('companylegalname') }}" required>

                                @if ($errors->has('companylegalname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companylegalname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('Landlineno') ? ' has-error' : '' }}">
                            <label for="companylegalname" class="col-md-4 control-label">Office Landline Number <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="companylegalname" type="text" class="form-control" name="Landlineno" value="{{ old('Landlineno') }}" required>

                                @if ($errors->has('Landlineno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Landlineno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control number" name="mobile" maxlength="12" minlength="10" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                           <div class="form-group{{ $errors->has('companyaddress') ? ' has-error' : '' }}">
                            <label for="companyaddress" class="col-md-4 control-label">Company’s Full Address <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                  <textarea id="companyaddress" class="form-control" required autofocus name="companyaddress">{{ old('companyaddress') }}</textarea>

                                @if ($errors->has('companyaddress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyaddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="City " class="col-md-4 control-label">City <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="city" type="text" value="{{ old('city') }}" class="form-control" name="city" required autofocus >

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('Pincode') ? ' has-error' : '' }}">
                            <label for="Pincode" class="col-md-4 control-label">Pincode <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="Pincode" type="text" pattern="[1-9][0-9]{5}"  maxlength="6" minlength="6" value="{{ old('Pincode') }}" class="form-control" name="Pincode" required>

                                @if ($errors->has('Pincode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Pincode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('gst') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">GST Identification No <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="gst" type="text" value="{{ old('gst') }}" class="form-control gstinnumber" name="gst" required>

                                @if ($errors->has('gst'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gst') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                      <div class="form-group{{ $errors->has('twiterh') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Twitter Handle <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="twiterh" type="text" value="{{ old('twiterh') }}" required="required" autofocus class="form-control" name="twiterh">

                                @if ($errors->has('twiterh'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twiterh') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       <div class="form-group{{ $errors->has('Facebook') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Facebook <span style="color: red;">*</span> </label>

                            <div class="col-md-6">
                                <input id="Facebook" type="text" value="{{ old('Facebook') }}" required="required" autofocus class="form-control" name="Facebook">

                                @if ($errors->has('Facebook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('Facebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('howtohear') ? ' has-error' : '' }}">
                            <label for="howtohear" class="col-md-4 control-label">How did you get to know about OOH AWARDS 2018? <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <select name="howtohear" id="howtohear" class="form-control" required autofocus>
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
                      
 <div><p style="    color: red;
    font-weight: bold;">Alternative Contact</p></div>


                        <div class="form-group{{ $errors->has('stitle') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <select name="stitle" id="stitle" class="form-control" required autofocus>
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

                        <div class="form-group{{ $errors->has('sname') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="sname" type="text" class="form-control" name="sname" value="{{ old('sname') }}" required autofocus>

                                @if ($errors->has('sname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                         <div class="form-group{{ $errors->has('sdesignation') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">Designation <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="sdesignation" type="text" class="form-control" name="sdesignation" value="{{ old('sdesignation') }}" required>

                                @if ($errors->has('sdesignation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sdesignation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('sLandlineno') ? ' has-error' : '' }}">
                            <label for="companylegalname" class="col-md-4 control-label">Office Landline Number <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="sLandlineno" type="text" class="form-control" name="sLandlineno" value="{{ old('sLandlineno') }}" required>

                                @if ($errors->has('sLandlineno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sLandlineno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('smobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="smobile" type="text" class="form-control snumber" name="smobile" maxlength="12" minlength="10" value="{{ old('smobile') }}" required>

                                @if ($errors->has('smobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('smobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-group{{ $errors->has('semail') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address <span style="color: red;">*</span></label>

                            <div class="col-md-6">
                                <input id="semail" type="email" class="form-control" name="semail" value="{{ old('semail') }}" required>

                                @if ($errors->has('semail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('semail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                                <button type="reset" class="btn btn-primary" value="Reset">Reset</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
    </div>
    
    </div>
    </div>
    </div>
@endsection