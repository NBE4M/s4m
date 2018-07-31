@extends('layouts.app')
@section('content')
<div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="register-form">  
                 <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="panel-title">Make Online Payment</div>
                        </div>
                        <div class="panel-body">
                    <form class="form-horizontal" name="frm1" id="senrollnow" role="form" method="POST" action="https://e4mevents.com/idma-2018/public/pay.php">
                        {{ csrf_field() }}
                        <input type="hidden" name="cip" value="{{$data['clientip'] }}" />
                            <input size="50" type="hidden" name="oid" value="{{$data['orderid']}}"  />
                        <input type="hidden" name="totalamount" value="{{ $data['totalamount'] }}" >
                         <input type="hidden" name="entry" value="{{ $data['num_del'] }}" >
                          <input type="hidden" name="gstamount" value="{{ $data['gst'] }}" >
                       <input type="hidden" name="responseSuccessURL" value="https://e4mevents.com/idma-2018/public/thankyou.php"/>
                         <input type="hidden" name="webhook" value="https://e4mevents.com/idma-2018/public/webhook.php"/>
                 
                    
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
                            <div class="col-md-6">{{ $data['gst']}}</div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Total Amount</label>
                            <div class="col-md-6">{{ $data['totalamount'] }}</div>
                        </div>

                        <div class="col-md-12 form_sub_hed">
    Please Fill in your details
      </div>
                 
                        
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $data['name'] }}"  >

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('companylegname') ? ' has-error' : '' }}">
                            <label for="company" class="col-md-4 control-label">Company</label>

                            <div class="col-md-6">
                                <input id="company" type="text" class="form-control" name="companylegname" value="{{ $data['companylegalname']}}"  >

                                @if ($errors->has('companylegname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('companylegname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('companylegname') ? ' has-error' : '' }}">
                            <label for="company" class="col-md-4 control-label">GST Number</label>

                            <div class="col-md-6">
                                <input id="gst_no" type="text" class="form-control" name="gst_no" value="{{ $data['gst_no']}}"  >

                                @if ($errors->has('gst_no'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gst_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    
                        
                        <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                        <label for="address1" class="col-md-4 control-label">  Address </label>
                            <div class="col-md-6">
                                <input id="address1" type="text" class="form-control" name="address" value="{{ $data['address'] }}" required>

                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                     
                        <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label for="city" class="col-md-4 control-label">  City</label>
                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control" name="city" value="{{ $data['city'] }}" required>
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
                                <input id="state" type="text" class="form-control" name="state" value="{{ $data['state'] }}" required>
                                @if ($errors->has('state'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('ctry') ? ' has-error' : '' }}">
                        <label for="country" class="col-md-4 control-label">  Country</label>
                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control" name="pin_code" value="{{ $data['ctry']  }}" required>
                         
                                @if ($errors->has('ctry'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ctry') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('pin_code') ? ' has-error' : '' }}">
                        <label for="zipcode" class="col-md-4 control-label">  ZIP/PIN</label>
                            <div class="col-md-6">
                                <input id="zipcode" type="text" class="form-control" name="pin_code" value="{{ $data['pin_code']  }}" required>
                                @if ($errors->has('pin_code'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pin_code') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
               <label for="mobile" class="col-md-4 control-label">Mobile  </label>

                            <div class="col-md-6">
                                <input id="mobile" type="text" class="form-control" name="mobile" value="{{ $data['mobile'] }}"  >
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
                         <input id="email" type="text" class="form-control" name="email" value="{{ $data['email'] }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group">
                                         <label for="email" class="col-md-4 control-label">Delegate Pass Category</label>
                                            <div class="col-md-6">
                                                @if($data['fees']=='rddele')
                                                <input name="del_fees" value="Delegate Pass Booking" type="text" id="txtRemrks" class="form-control req" placeholder="Remark" />
                                                @else
                                                  <input name="del_fees" value="Table Booking" type="text" id="txtRemrks" class="form-control req" placeholder="Remark" />
                                                  @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                         <label for="email" class="col-md-4 control-label">Delegate Type*</label>
                                            <div class="col-md-6">
                                                @if($data['del_fees']=='evp')
                                                <input name="del_type" value="Exhibition/Visitor Pass" type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                @elseif($data['del_fees']=='cpb')
                                                  <input name="del_type" value="Conference Pass Booking" type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                   @elseif($data['del_fees']=='ap')
                                                  <input name="del_type" value="Awards Pass" type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                   @elseif($data['del_fees']=='acp')
                                                  <input name="del_type" value="All Access Pass" type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                  @else
                                                   <input name="txtRemrks" value="Students " type="text" id="txtRemrks" class="form-control req" placeholder="Remark" />
                                                  @endif
                                            </div>
                                        </div>
                                    </div>
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
</div>
<script type="text/javascript">
    function forcheckdetail() {

        if (document.getElementById("drpbd").value == "Yes") {

            document.getElementById("cn").style.display = "block";
            document.getElementById("bn").style.display = "block";
            document.getElementById("br").style.display = "none";
        }
        if (document.getElementById("drpbd").value == "No") {

            document.getElementById("cn").style.display = "none";
            document.getElementById("bn").style.display = "none";
        }
    }
</script>
<script>
    var s = $("option:selected").val();

    if(s == 'Yes'){

        $('.req').prop('required',true);
    }



</script>
<script language="javascript" type="text/javascript">
    function IsValidEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };
</script>
<script language="javascript" type="text/javascript">
    function Buttonvalidate() {

        if (document.getElementById("txtGSTNo").value == "") {
            alert("Please Enter GST No.");
            document.getElementById("txtGSTNo").focus();
            return false;
        }
        var emailPatt = /^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]+)$/
        var emailid = document.getElementById("txtGSTNo").value;
        var matchArray = emailid.match(emailPatt);
        if (matchArray == null) {
            alert("Enter Valid GST NO ");
            document.getElementById("txtGSTNo").focus();
            return false;
        }

        var sdfd = document.getElementById("txtGSTNo").value;
        if (sdfd.length < 15) {
            alert("Enter Valid GST NO ");
            document.getElementById("txtGSTNo").focus();
            return false;
        }
        if (document.getElementById("txtMobileNo").value == "") {
            alert("Please Enter MobileNo");
            document.getElementById("txtMobileNo").focus();
            return false;
        }
        if (document.getElementById("txtAddress").value == "") {
            alert("Please Enter Address");
            document.getElementById("txtAddress").focus();
            return false;
        }
        if (document.getElementById("drpbd").value == "Yes") {
            if (document.getElementById("txtChqNo").value == "") {
                alert("Please Enter Cheque No");
                document.getElementById("txtChqNo").focus();
                return false;
            }
            if (document.getElementById("txtBankName").value == "") {
                alert("Please Enter Bank Name");
                document.getElementById("txtBankName").focus();
                return false;
            }

        }
    }
</script>
@endsection