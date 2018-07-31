@extends('layouts.app')
@section('content')
@if ( Session::has('message') )
<div class="col-md-4 col-xs-12 top50" style="
    background: red;
    padding: 9px;
    font-size: 17px;
    border-radius: 0px;
    z-index: 9999;
    right: 0;
    top: 11px;
    border-top: none !important;
    color: white;
    position: fixed;
    text-align: center;">
      {{ Session::get('message') }}
</div>
@endif
<br><br>
  <div class="container">
            <div class="row">
                <div class="col-lg-6">
                <div class="register-form">  
                 <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="panel-title">DELEGATE REGISTRATION</div>
                        <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 pull-left">
                                    <div class="form-group mandatory">
                                        <small>Fields marked with <span class="mandat">*</span> are mandatory</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">
                      <form  action="{{ url('/delegate_reg') }}" role="form"   method="GET">
        {{ csrf_field() }}
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Name<span class="mandat">*</span></label>
                                        <input type="text" required name="name" id="" class="form-control input-sm">
                                        
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Mobile<span class="mandat">*</span></label>
                                        <input type="number" required name="mobile" id="" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>

                            

                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>E-mail<span class="mandat">*</span></label>
                                          <input name="email" type="email"  required="" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>How did you get to know about us<span class="mandat">*</span></label>
                                                <select name="info" class="form-control" required>
                                                <option value="0">Select</option>
                                                <option value="e4m mailer">e4m Mailer</option>
                                                <option value="voice call">Voice Call from e4m</option>
                                                <option value="print ad">Print Ad</option>
                                                <option value="social media">Social Media</option>
                                                <option value="others">Others</option>

                                                </select>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Designation<span class="mandat">*</span></label>
                                        <input type="text" required name="designation" id="" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Department<span class="mandat">*</span></label>
                                        <input type="text" required name="department" id="" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Organization Name <span class="mandat">*</span></label>
                                        <input type="text" required name="companylegalname" id="" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Address <span class="mandat">*</span></label>
                                        <textarea type="text" required name="address" id="" class="form-control input-sm"></textarea>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>City<span class="mandat">*</span></label>
                                        <input type="text" required name="city" id="" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>State<span class="mandat">*</span></label>
                                        <input type="text" required name="state" id="" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Country<span class="mandat">*</span></label>
                                        <select class="selectcountry" required name="country">
                                          <option>Select</option>
                                          <option value="India" selected>India</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Pincode<span class="mandat">*</span></label>
                                        <input type="number" name="pincode" required id="" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Delegate Pass Category<span class="mandat">*</span></label>
                                        <select class="selectcountry" required name="fees" id="fees">
                                          <option>Select</option>
                                          <option value="rddele">A. Delegate Pass Booking</option>
                                          <option value="rdtblbook">B. Table Booking - Save 5% on Table Booking</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6" id="del_s">
                                    <div class="form-group">
                                        <label>Delegate Type<span class="mandat">*</span></label>
                                        <select class="selectcountry del_fees" required name="del_fees" id="del_fees">
                                           
                                        </select>
                                    </div>
                                </div>
                             </div>
                            <div class="row">
                                
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Number of Delegate/ Tables<span class="mandat">*</span></label>
                                        <input type="number" name="num_del" required id="num_del" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Amount<span class="mandat">*</span></label>
                                        <input type="number" name="amount" required id="amount" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>GST(18%)<span class="mandat">*</span></label>
                                        <input type="number" name="gstamount" required id="gstamount" class="form-control input-sm">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Total Amount<span class="mandat">*</span></label>
                                        <input type="number" name="totalamount" required id="totalamount" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Payment Mode<span class="mandat">*</span></label>
                                        <select class="selectcountry" required name="pay_mode" id="pay_mode">
                                        
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>GST Identification No<span class="mandat"></span></label>
                                        <input type="text" name="txtGSTNo" required id="txtGSTNo" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label>Delegate Name, Designation, Organization& Email id<span class="mandat">*</span></label>
                                        <textarea type="text" rows="5" required name="summary" id="summary" class="form-control input-sm"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                            
                            
                            
                            <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group mandatory">
                                        <input type="submit" value="REGISTER" class="btn btn-info btn-block btn">
                                    </div>
                                </div>
                                
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group mandatory">
                                        <input type="submit" value="Reset" class="btn btn-info btn-block btn-primary reset-btn">
                                    </div>
                                </div>
                            </div>
                            
                        
                        </form>
                    </div>
                </div>
               </div>     
            </div>
            <div class="col-lg-6">
                <div class="structure"> 
                    <h4 class="panel-title">Fees Structure:</h4>
                 <p class="categ-title"><strong>A. Delegate Pass Booking</strong></p>
                 <ul>
                    <li>Conference Pass: 4,000* (Includes Lunch + Hi Tea)</li>
                    <li>Awards Pass: 7,000* (Includes Dinner and Cocktails)</li>
                    <li>All Access Pass : (Conference + Awards): 9,000* (Includes Lunch, Hi-Tea, Dinner and Cocktails)</li>
                    <li>Students (Conference + Exhibition) Pass: 2,000*(Includes Lunch + Hi Tea)</li>
                 </ul>
                 <p class="categ-title"><strong>B. Table Booking - SAVE 10% on Table Booking</strong></p>
                 <ul>
                    <li>For Conference (8 seats) | 29,000* (Lunch and Hi-Tea)</li>
                    <li>For Awards (8 seats) | 50,400* (Dinner and Cocktails)</li>
                    <li>For Awards + Conference Pass (8 seats) | 65,000* (Includes Lunch, Hi-Tea, Dinner and Cocktails)</li>
                 </ul>
                 <ul class="note">
                                <h4>Note</h4>
                                <li><strong>1.</strong> (*): Taxes as applicable.</li>
                                <li><strong>2.</strong> All payments must be made at one go, either by credit/ debit cards, net-banking or cheque/ Deman Draft. (infavour of Adsert Web Solutions Private Limited and must reach our Delhi/NCR office at B-20, Sector 57, Noida - 201301.</li>
                                <li><strong>3.</strong> No refund applicable on cancellation.</li>
                                <li><strong>4.</strong> All submissions to be addressed to 'Nikita Vig and send on the following address: B-20, Sector 57, NOIDA - 201 301, UP</li>

                            </ul>
              <p class="panel-title"><strong>For any queries, please contact: </strong></p>
                <div class="row contact-details">
                <div class="col-md-4"><strong>Amisha Shah   </strong> <br> +91 9979972990   </div>
                <div class="col-md-8"><a href="mailto:priyanka.bhadouria@exchange4media.com">amisha.shah@exchange4media.com</a></div>
                </div>
                
                <div class="row contact-details">
                    <div class="col-md-4"><strong>Nikita Vig        </strong>  <br> +91 8860302087</div>  
                    <div class="col-md-8"><a href="mailto:nikita.vig@exchange4media.com">nikita.vig@exchange4media.com</a></div>
                </div>
                
                <div class="row contact-details">
                    <div class="col-md-4"><strong>Priyanka Bhadouri</strong> <br> +91 9312634276    </div>
                    <div class="col-md-8"><a href="mailto:priyanka.bhadouria@exchange4media.com">priyanka.bhadouria@exchange4media.com</a></div>
                </div>
                </div>
                </div>
            </div> 
        </div>
      </section>
<script>
    $("#del_fees").change(function () {
         $('#totalamount').val('');
                $('#amount').val('');
                $('#gstamount').val('');
                $('#num_del').val('');
            });
    </script>
    <script>
    $("#dl_type").change(function () {
         $('#totalamount').val('');
                $('#amount').val('');
                $('#gstamount').val('');
                $('#num_del').val('');

            });
    </script>
<script>
    $("#fees").change(function () {
        var fees = $('#fees').val();
            if (fees=='rddele') { 
                $('.del_fees').empty();
                $('.del_fees').append('<option>Select</option><option value="cpb">A. Conference Pass Booking</option><option value="ap">B. Awards Pass </option><option value="acp">C. All Access Pass </option><option value="st">D. Students </option>');
                $('#totalamount').val('');
                $('#amount').val('');
                $('#gstamount').val('');
                $('#num_del').val('');
                $('#num_del').on('blur', function(){
                     var am =  $('#del_fees').val();
                     if (am=='evp') {
                        var a = 0;
                         $('#txtGSTNo').val('09AAECA0652M1ZL');
                           $('#pay_mode').empty();
                         $("#pay_mode").append('<option value="NA">NO PAYMENTS</option>');
                     } if (am=='cpb') {
                        var a = 4000;
                         $('#txtGSTNo').val('');
                          $('#pay_mode').empty();
                             $("#pay_mode").append('<option value="">Select</option><option value="CC">Credit Card (master / Visa)</option><option value="Cheque/Demand Draft">Cheque/Demand Draft</option><option value="NEFT">NEFT</option>');
                     }
                     if (am=='ap') {
                        var a = 7000;
                          $('#txtGSTNo').val('');
                          $('#pay_mode').empty();
                           $("#pay_mode").append('<option value="">Select</option><option value="CC">Credit Card (master / Visa)</option><option value="Cheque/Demand Draft">Cheque/Demand Draft</option><option value="NEFT">NEFT</option>');
                     }
                     if (am=='acp') {
                        var a = 9000;
                         $('#txtGSTNo').val('');
                          $('#pay_mode').empty();
                          $("#pay_mode").append('<option value="">Select</option><option value="CC">Credit Card (master / Visa)</option><option value="Cheque/Demand Draft">Cheque/Demand Draft</option><option value="NEFT">NEFT</option>');
                     }
                      if (am=='st') {
                        var a = 2000;
                         $('#txtGSTNo').val('');
                          $('#pay_mode').empty();
                         $("#pay_mode").append('<option value="">Select</option><option value="CC">Credit Card (master / Visa)</option><option value="Cheque/Demand Draft">Cheque/Demand Draft</option><option value="NEFT">NEFT</option>');
                     }
                    var b = $('#num_del').val();
                        var c = Number(a) * Number(b);
                        //alert(c);
                        var gst = c* 18/100;
                        var sum = Number(c) + Number(gst);
                        $('#amount').val(c);
                         $('#amount').val(c);
                        $('#gstamount').val(gst);
                        $('#totalamount').val(sum);

                })
            }
            else { 
                $('.del_fees').empty();
                $('.del_fees').append('<option>Select</option><option value="cfe">A. Conference </option><option value="aw">B. Awards</option><option value="awcfe">C. Awards + Conference </option>');
                 $('#totalamount').val('');
                 $('#amount').val('');
                $('#gstamount').val('');
                $('#num_del').val('');
                $('#num_del').on('blur', function(){
                    var am = $('#del_fees').val();
                    if (am=='cfe') {
                        var a = 29000;
                        $('#txtGSTNo').val('');
                          $('#pay_mode').empty();
                           $("#pay_mode").append('<option value="">Select</option><option value="CC">Credit Card (master / Visa)</option><option value="Cheque/Demand Draft">Cheque/Demand Draft</option><option value="NEFT">NEFT</option>');
                     } if (am=='aw') {
                        var a = 50400;
                        $('#txtGSTNo').val('');
                          $('#pay_mode').empty();
                           $("#pay_mode").append('<option value="">Select</option><option value="CC">Credit Card (master / Visa)</option><option value="Cheque/Demand Draft">Cheque/Demand Draft</option><option value="NEFT">NEFT</option>');
                     }
                     if (am=='awcfe') {
                        var a = 65000;
                        $('#txtGSTNo').val('');
                          $('#pay_mode').empty();
                           $("#pay_mode").append('<option value="">Select</option><option value="CC">Credit Card (master / Visa)</option><option value="Cheque/Demand Draft">Cheque/Demand Draft</option><option value="NEFT">NEFT</option>');
                     }
                    var b = $('#num_del').val();
                        var c = Number(a) * Number(b);
                        //alert(c);
                        var gst = c* 18/100;
                        var sum = Number(c) + Number(gst);
                        $('#amount').val(c);
                        $('#gstamount').val(gst);
                        $('#totalamount').val(sum);

                })

            }
     
    });
</script>

<script language="javascript" type="text/javascript">
    function IsValidEmail(email) {
        var expr = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        return expr.test(email);
    };
</script>
<!-- <script language="javascript" type="text/javascript">
    function Buttonvalidate() {
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
</script> -->
@endsection    
