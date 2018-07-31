@extends('layouts.app')

@section('content')
<br><br><br>
  <div class="col-md-1">
  </div>
        <div class="col-md-10 mbottom100">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title *</label>

                            <div class="col-md-6">
                                <select name="title" id="title" class="form-control" >
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
                            <label for="name" class="col-md-4 control-label">Name *</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password *</label>

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
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="mobile" class="col-md-4 control-label">Mobile *</label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}" required>

                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-md-4 control-label">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" >

                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">Designation *</label>

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
                            <label for="department" class="col-md-4 control-label">Department * </label>

                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control" name="department" value="{{ old('department') }}" required>

                                @if ($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                     
                        <div class="form-group{{ $errors->has('organization') ? ' has-error' : '' }}">
                            <label for="organization" class="col-md-4 control-label">Organization *</label>

                            <div class="col-md-6">
                                <input id="organization" type="text" class="form-control" name="organization" value="{{ old('organization') }}" required>

                                @if ($errors->has('organization'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organization') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('companylegalname') ? ' has-error' : '' }}">
                            <label for="companylegalname" class="col-md-4 control-label">Company Legal Name *</label>

                            <div class="col-md-6">
                                <input id="companylegalname" type="text" class="form-control" name="companylegalname" value="{{ old('companylegalname') }}" required>

                                @if ($errors->has('companylegalname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companylegalname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

<div class="form-group{{ $errors->has('companyaddress') ? ' has-error' : '' }}">
                            <label for="companyaddress" class="col-md-4 control-label">Company Address</label>

                            <div class="col-md-6">
                                <input id="companyaddress" type="text" class="form-control" name="companyaddress" value="{{ old('companyaddress') }}" >

                                @if ($errors->has('companyaddress'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companyaddress') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('howtohear') ? ' has-error' : '' }}">
                            <label for="howtohear" class="col-md-4 control-label">How did you get to know about ENBA 2017?</label>

                            <div class="col-md-6">
                                <select name="howtohear" id="howtohear" class="form-control" >
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
                         
                         
                        
                         
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    
 
@endsection
