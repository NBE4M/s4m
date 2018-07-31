@extends('layouts.app')

@section('content')
            <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-2">
        <div class="entry-form">   
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">NEFT</div>
            </div>
            <div class="panel-body">
         <form class="form-horizontal" name="payment" method="POST" action="{{ url('/neftdatainsert') }}">
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
                                            <input name="txtName" type="text" id="txtName" class="form-control" placeholder="Name" required="" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Email <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtEmail" type="text" id="txtEmail" class="form-control" placeholder="Email" required="" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Company’s Legal Name <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtCompanyName" type="text" id="txtCompanyName" class="form-control" placeholder="Company’s Legal Name" required="" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            GST Identification No. <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtGSTNo" type="text" value="{{ $data['gst'] }}" id="txtGSTNo" class="form-control" placeholder="GST Identification No." required="" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Mobile No. <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtmobile" type="text" id="txtmobile" class="form-control" placeholder="Mobile No." required="" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Address <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="txtaddress" type="text" id="txtaddress" class="form-control" placeholder="Address" required="" />
                                        </div>
                                    </div>

                                </div>
                                 <div class="row top10">
                                        <div class="col-md-12 col-xs-12">
                                            <label for="inputEmail3" class="col-md-4 control-label">
                                                Remark
                                            </label>
                                            <div class="col-md-8">
                                                <input name="txtRemrks" type="text" id="txtRemrks" class="form-control" placeholder="Remark" required="" />
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
                       

               
<script type="text/javascript">
WebForm_AutoFocus('txtName');
</script>


                             <label>
                <strong style="text-transform:uppercase;">Below mentioned are the NEFT Details:</strong></label><br />
            <label>
               &#8594; Beneficiary Bank Name : ICICI Bank Ltd.
            </label>
            <br />
            <label style="font-style:normal;">
               &#8594; Beneficiary Bank A/c No. : 000705020823</label><br />
            <label>
               &#8594; Beneficiary Name & addressed : Adsert Web Solutions Pvt. Ltd. B-20, Sector 57, Noida-201301</label><br />
                </form>
                    </div>

                </div>
            </div>
        </div>
    </div></div>
@endsection
