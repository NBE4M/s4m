@extends('layouts.app')
@section('content')
 <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="register-form">  
                 <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="panel-title">Make CHEQUE Payment</div>
                        </div>
                        <div class="panel-body">
         <form class="form-horizontal" name="payment" method="POST" action="{{ url('delchequedatainsert') }}">
                    {{ csrf_field() }}
                        <!-- form start-->
                        <div class="form-horizontal">
                            <div class="form-group hr">
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Number of Delegate <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="num_del" type="text" id="txtTotalamount" readonly="readonly" value="{{ $data['num_del'] }}" class="form-control" placeholder="Total Amount"  />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Total Amount + GST <span>*</span>
                                        </label>
                                        <div class="col-md-4">
                                            <input name="amount" type="text" id="txtAmount" readonly="readonly" class="form-control" placeholder="Total Amount" value="{{ $data['amount'] }}" />
                                        </div>
                                        <div class="col-md-1">
                                            <strong>+</strong>
                                        </div>
                                        <div class="col-md-3">
                                            <input name="gst" type="text" id="txtGSTAmount" class="form-control" placeholder="GST" value="{{ $data['gst'] }}" readonly="readonly" />
                                        </div>

                                    </div>
                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Total Amount <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="chargetotal" type="text" id="txtTotalamount" readonly="readonly" value="{{ $data['totalamount'] }}" class="form-control" placeholder="Total Amount"  />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Name <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtName" type="text" id="txtName" class="form-control" value="{{ $data['name'] }}" 
                                            placeholder="Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Email <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="email" type="text" id="txtEmail" class="form-control" value="{{ $data['email'] }}" placeholder="Email" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Company’s Legal Name <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="companylegname" type="text" id="txtCompanyName" class="form-control" value="{{ $data['companylegalname'] }}" placeholder="Company’s Legal Name" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            GST Identification No. <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="gst_no" type="text" value="{{ $data['gst_no'] }}" id="txtGSTNo" class="form-control" placeholder="GST Identification No." />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Mobile No. <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="mobile" type="text" id="txtmobile" class="form-control" value="{{ $data['mobile'] }}" placeholder="Mobile No." />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Address <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="address" type="text" id="txtaddress" class="form-control" value="{{ $data['address'] }}" placeholder="Address" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            I have Bank Detail <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                               <select name="drpbd" id="drpbd" class="form-control" onchange="forcheckdetail()">
    <option value="Yes">Yes</option>
    <option value="No">No</option>

</select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10"  id="cn">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Cheque No. <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtChqNo" type="text" id="txtChqNo" class="form-control req" placeholder="Cheque No." />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10"  id="bn">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Bank Name <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtBankName" type="text" id="txtBankName" class="form-control req" placeholder="Bank Name" />
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row top10">
                                        <div class="col-md-12 col-xs-12">
                                            <label for="inputEmail3" class="col-md-4 control-label">
                                                Delegate Pass Category
                                            </label>
                                            <div class="col-md-8">
                                                @if($data['fees']=='rddele')
                                                <input name="del_fees" value="Delegate Pass Booking" type="text" id="txtRemrks" class="form-control req" placeholder="Remark" />
                                                @else
                                                  <input name="del_fees" value="Table Booking" type="text" id="txtRemrks" class="form-control req" placeholder="Remark" />
                                                  @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row top10">
                                        <div class="col-md-12 col-xs-12">
                                            <label for="inputEmail3" class="col-md-4 control-label">
                                                Delegate Type*
                                            </label>
                                            <div class="col-md-8">
                                                @if($data['del_fees']=='evp')
                                                <input name="del_type" value="Exhibition/Visitor Pass" type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                @elseif($data['del_fees']=='cpb')
                                                  <input name="del_type" value="Conference Pass Booking" type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                   @elseif($data['del_fees']=='ap')
                                                  <input name="del_type" value="Awards Pass" type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                   @elseif($data['del_fees']=='acp')
                                                  <input name="del_type" value="All Access Pass" type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                   @elseif($data['del_fees']=='cfe')
                                                  <input name="del_type" value="Conference " type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                   @elseif($data['del_fees']=='aw')
                                                  <input name="del_type" value="Awards" type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                   @elseif($data['del_fees']=='awcfe')
                                                  <input name="del_type" value="Awards + Conference " type="text" id="txtRemrks" class="form-control req" placeholder="" />
                                                  @else
                                                   <input name="txtRemrks" value="Students " type="text" id="txtRemrks" class="form-control req" placeholder="Remark" />
                                                  @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row top10">
                                        <div class="col-md-12 col-xs-12">
                                            <label for="inputEmail3" class="col-md-4 control-label">
                                                Remark
                                            </label>
                                            <div class="col-md-8">
                                                <input name="txtRemrks" type="text" id="txtRemrks" class="form-control req" placeholder="Remark" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--contact form-->
                        <div class="row top10">
                            <div class="col-md-12 text-center">
                                 <input type="submit" name="btnsubmit" value="SUBMIT"  onclick="javascript:return Buttonvalidate();" id="btnsubmit" class="btn btn-primary btn-lg active" />
                            </div>
                        </div>
                        </form>
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
        if (document.getElementById("txtAmount").value == "") {
            alert("Please Enter Amount");
            document.getElementById("txtAmount").focus();
            return false;
        }
        if (document.getElementById("txtName").value == "") {
            alert("Please Enter Name");
            document.getElementById("txtName").focus();
            return false;
        }
        if (document.getElementById("txtEmail").value == "") {
            alert("Please Enter Email ID");
            document.getElementById("txtEmail").focus();
            return false;
        }
        var email = document.getElementById("txtEmail").value;
        if (!IsValidEmail(email)) {
            alert("Invalid email Email.");
            document.getElementById("txtEmail").focus()
            return false;
        }
        if (document.getElementById("txtCompanyName").value == "") {
            alert("Please Enter Organisation");
            document.getElementById("txtCompanyName").focus();
            return false;
        }
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