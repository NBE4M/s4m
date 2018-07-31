@extends('layouts.app')

@section('content')
             <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-2">
        <div class="entry-form">   
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">CHEQUE PAYMENT</div>
            </div>
            <div class="panel-body">
         <form class="form-horizontal" name="payment" method="POST" action="{{ url('/chequedatainsert') }}">
                    {{ csrf_field() }}
                        <!-- form start-->
                        <div class="form-horizontal">
                            <div class="form-group hr">
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            No. of Entries <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtentry" type="text" id="txtentry" readonly="readonly" class="form-control" placeholder="No. of Entries" value="{{ $data['entry'] }}" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Total Amount + GST <span>*</span>
                                        </label>
                                        <div class="col-md-4">
                                            <input name="txtAmount" type="text" id="txtAmount" readonly="readonly" class="form-control" placeholder="Total Amount" value="{{ $data['amount'] }}" />
                                        </div>
                                        <div class="col-md-1">
                                            <strong>+</strong>
                                        </div>
                                        <div class="col-md-3">
                                            <input name="GSTAmount" type="text" id="txtGSTAmount" class="form-control" placeholder="GST" value="{{ $data['gstamount'] }}" readonly="readonly" />
                                        </div>

                                    </div>
                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Total Amount <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtTotalamount" type="text" id="txtTotalamount" readonly="readonly" value="{{ $data['amount'] + $data['gstamount'] }}" class="form-control" placeholder="Total Amount"  />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Name <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtName" type="text" id="txtName" class="form-control" placeholder="Name" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Email <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtEmail" type="text" id="txtEmail" class="form-control" placeholder="Email" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Company’s Legal Name <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtCompanyName" type="text" id="txtCompanyName" class="form-control" placeholder="Company’s Legal Name" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            GST Identification No. <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtGSTNo" type="text" value="{{ $data['gst'] }}" id="txtGSTNo" class="form-control" placeholder="GST Identification No." />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Mobile No. <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtmobile" type="text" id="txtmobile" class="form-control" placeholder="Mobile No." />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Address <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtaddress" type="text" id="txtaddress" class="form-control" placeholder="Address" />
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
                                 <input type="submit" name="btnsubmit" value="SUBMIT" onclick="javascript:return Buttonvalidate();" id="btnsubmit" class="btn btn-primary btn-lg active" />
                            </div>
                        </div>
                        </form>
                    </div>
                    </div>
                    </div></div></div></div>

               
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
