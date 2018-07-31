@extends('layouts.app')

@section('content')

  <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-2">
        <div class="entry-form">   
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">Make Online Payment</div>
            </div>
            <div class="panel-body">
                    <form class="form-horizontal" name="frm1" id="senrollnow" role="form" method="POST" action="https://e4mevents.com/idma-2018/public/entrypay.php">
                        {{ csrf_field() }}
                        <input type="hidden" name="entry" value="{{ $data['entry'] }}" >
                         <input type="hidden" name="description" value="Payment" >
                        <input type="hidden" name="timezone" value="IST" />
                        <input type="hidden" name="authenticateTransaction" value="true" />
                        <input type="hidden" name="cip" value="{{$data['clientip'] }}" />
                        <input size="50" type="hidden" name="chargetotal" value="{{$data['chargetotal'] }}"  />
                        <input size="50" type="hidden" name="oid" value="{{$data['orderid']}}"  />
                        <input type="hidden" name="responseSuccessURL" value="https://e4mevents.com/idma-2018/public/entrythankyou.php"/>
                         <input type="hidden" name="webhook" value="https://e4mevents.com/idma-2018/public/entrywebhook.php"/>
                    <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Number Of Entries</label>
                            <div class="col-md-6">{{ $data['entry'] }}</div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Currency</label>
                            <div class="col-md-6"> INR </div>
                        </div>
                           <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Amount</label>
                            <div class="col-md-6">{{ $data['amount']}}</div>
                        </div>
                         <div class="form-group">
                            <label for="name" class="col-md-4 control-label">GST</label>
                            <div class="col-md-6">{{ $data['gstamount']}}</div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Total Amount</label>
                            <div class="col-md-6">{{ $data['amount']+$data['gstamount'] }}</div>
                        </div>

                        <div class="col-md-12 form_sub_hed">
    Please Fill in your details
      </div>
                 
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('company') ? ' has-error' : '' }}">
                            <label for="company" class="col-md-4 control-label">Company</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="company" value="{{ old('company') }}"  required>

                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
               <label for="designation" class="col-md-4 control-label">Designation</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control" name="designation" value="{{ old('designation') }}" required>

                                @if ($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('address1') ? ' has-error' : '' }}">
                        <label for="address1" class="col-md-4 control-label">  Address 1</label>
                            <div class="col-md-6">
                                <input id="address1" type="text" class="form-control" name="address1" value="{{ old('address1') }}" required>

                                @if ($errors->has('address1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address2') ? ' has-error' : '' }}">
                        <label for="address2" class="col-md-4 control-label">  Address 2</label>
                            <div class="col-md-6">
                                <input id="address2" type="text" class="form-control" name="address2" value="{{ old('address2') }}" required>

                                @if ($errors->has('address2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('address3') ? ' has-error' : '' }}">
                        <label for="address3" class="col-md-4 control-label">  Address 3</label>
                            <div class="col-md-6">
                                <input id="address3" type="text" class="form-control" name="address3" value="{{ old('address3') }}" required>

                                @if ($errors->has('address3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label for="city" class="col-md-4 control-label">  City</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ old('city') }}" required>
                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('state') ? ' has-error' : '' }}">
                        <label for="state" class="col-md-4 control-label">  State</label>
                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control" name="state" value="{{ old('state') }}" required>
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                        <label for="country" class="col-md-4 control-label">  Country</label>
                            <div class="col-md-6">
                            <select id="country"  class="form-control" name="country" required>
                            <option value="">Select country</option>
                            <option value="IND">India</option>
                            </select>
                             <!-- <input id="country" type="text" class="form-control" name="country" value="{{ old('country') }}" required>-->
                                @if ($errors->has('country'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                        <label for="zipcode" class="col-md-4 control-label">  ZIP/PIN</label>
                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}" required>
                                @if ($errors->has('zipcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('zipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
               <label for="mobile" class="col-md-4 control-label">Mobile  </label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"  >
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
               <label for="email" class="col-md-4 control-label">Email ID </label>

                            <div class="col-md-6">
                         <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="col-md-12 pdng_none">
                                <label class="checkbox-inline">
                                    <input type="checkbox" onclick="javascript:CheckBoth_payment();" id="bothsame_payment" value="">
                                    <strong>Please Click if Billing Address is same</strong>
                                </label>
                            </div>
                     
                         <div class="form-group{{ $errors->has('bname') ? ' has-error' : '' }}">
                            <label for="bname" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="bname" type="text" class="form-control" name="bname" value="{{ old('bname') }}"  >

                                @if ($errors->has('bname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bcompany') ? ' has-error' : '' }}">
                            <label for="bcompany" class="col-md-4 control-label">Company</label>

                            <div class="col-md-6">
                                <input id="bcompany" type="text" class="form-control" name="bcompany" value="{{ old('bcompany') }}"  >

                                @if ($errors->has('bcompany'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bcompany') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bdesignation') ? ' has-error' : '' }}">
               <label for="bdesignation" class="col-md-4 control-label">Designation</label>

                            <div class="col-md-6">
                                <input id="bdesignation" type="text" class="form-control" name="bdesignation" value="{{ old('bdesignation') }}" required>

                                @if ($errors->has('bdesignation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bdesignation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('baddress1') ? ' has-error' : '' }}">
                        <label for="baddress1" class="col-md-4 control-label">  Address 1</label>
                            <div class="col-md-6">
                                <input id="baddress1" type="text" class="form-control" name="baddress1" value="{{ old('baddress1') }}" required>

                                @if ($errors->has('baddress1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('baddress1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('baddress2') ? ' has-error' : '' }}">
                        <label for="baddress2" class="col-md-4 control-label">  Address 2</label>
                            <div class="col-md-6">
                                <input id="baddress2" type="text" class="form-control" name="baddress2" value="{{ old('baddress2') }}" required>
                                @if ($errors->has('baddress2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('baddress2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('baddress3') ? ' has-error' : '' }}">
                        <label for="baddress3" class="col-md-4 control-label">  Address 3</label>
                            <div class="col-md-6">
                                <input id="baddress3" type="text" class="form-control" name="baddress3" value="{{ old('baddress3') }}" required>
                                @if ($errors->has('baddress3'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('baddress3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bcity') ? ' has-error' : '' }}">
                        <label for="bcity" class="col-md-4 control-label">  City</label>
                            <div class="col-md-6">
                                <input id="bcity" type="text" class="form-control" name="bcity" value="{{ old('bcity') }}" required>
                                @if ($errors->has('bcity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bcity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bstate') ? ' has-error' : '' }}">
                        <label for="bstate" class="col-md-4 control-label">  State</label>
                            <div class="col-md-6">
                                <input id="bstate" type="text" class="form-control" name="bstate" value="{{ old('bstate') }}" required>
                                @if ($errors->has('bstate'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bstate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bcountry') ? ' has-error' : '' }}">
                        <label for="bcountry" class="col-md-4 control-label">  Country</label>
                            <div class="col-md-6">
                    <!-- <input id="bcountry" type="text" class="form-control" name="bcountry" value="{{ old('bcountry') }}" required>-->
                            <select id="bcountry"  class="form-control" name="bcountry" required>
                            <option value="">Select country</option>
                            <option value="IND">India</option>
                            </select>   
                               @if ($errors->has('bcountry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bcountry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bzipcode') ? ' has-error' : '' }}">
                        <label for="bzipcode" class="col-md-4 control-label">  ZIP/PIN</label>
                            <div class="col-md-6">
                                <input id="bzipcode" type="text" class="form-control" name="bzipcode" value="{{ old('bzipcode') }}" required>
                                @if ($errors->has('bzipcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bzipcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('bmobile') ? ' has-error' : '' }}">
               <label for="bmobile" class="col-md-4 control-label">Mobile  </label>

                            <div class="col-md-6">
                                <input id="bmobile" type="text" class="form-control" name="bmobile" value="{{ old('bmobile') }}" required>
                                @if ($errors->has('bmobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bmobile') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('bemail') ? ' has-error' : '' }}">
               <label for="bemail" class="col-md-4 control-label">Email ID </label>

                            <div class="col-md-6">
                         <input id="bemail" type="text" class="form-control" name="bemail" value="{{ old('bemail') }}" required>

                                @if ($errors->has('bemail'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('bemail') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('gst') ? ' has-error' : '' }}">
               <label for="bemail" class="col-md-4 control-label">GST IN</label>

                            <div class="col-md-6">
                         <input id="gstdata" type="text" class="form-control" name="gstdata" value="{{$data['gst']}}" required>

                                @if ($errors->has('gstdata'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gstdata') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
     <input type="hidden" name="uid" id="uid" value="{{ $data['userid']  }}" >
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    CLICK TO CONTINUE
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div></div></div>
 
@endsection
