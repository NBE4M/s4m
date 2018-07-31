@extends('layouts.app')
@section('content')
 <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="register-form">  
                 <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="panel-title">Delegate Registration</div>
                        </div>
                        <div class="panel-body">
         <form class="form-horizontal" name="payment" method="POST" action="{{ url('/delneftpayment') }}">
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
                                            <input name="txtAmount" type="text" id="txtAmount" readonly="readonly" class="form-control" placeholder="Total Amount" value="{{ $data['amount'] }}" />
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
                                            <input name="name" type="text" id="txtName" class="form-control" placeholder="Name" required="" value="{{ $data['name'] }}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Email <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="email" type="text" id="txtEmail" class="form-control" placeholder="Email" value="{{ $data['email'] }}" required="" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Company’s Legal Name <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="companylegname" type="text" id="txtCompanyName" class="form-control" placeholder="Company’s Legal Name" value="{{ $data['companylegalname'] }}" required="" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            GST Identification No. <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="gst_no" type="text" value="{{ $data['gst_no'] }}" id="txtGSTNo" class="form-control" placeholder="GST Identification No." required="" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Mobile No. <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="mobile" type="text" id="txtmobile" class="form-control" placeholder="Mobile No." value="{{ $data['mobile'] }}" required="" />
                                        </div>
                                    </div>

                                </div>
                                <div class="row top10">
                                    <div class="col-md-12 col-xs-12">
                                        <label for="inputEmail3" class="col-md-4 control-label">
                                            Address <span>*</span>
                                        </label>
                                        <div class="col-md-8">
                                            <input name="address" type="text" id="txtaddress" class="form-control" placeholder="Address" value="{{ $data['address'] }}" required="" />
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
                                                <input name="txtRemrks" type="text" id="txtRemrks" class="form-control" placeholder="Remark" required="" />
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <!--contact form-->
                        <div class="row top10">
                            <div class="col-md-12 text-center">
                                 <input type="submit" name="btnsubmit" value="SUBMIT" id="btnsubmit" class="btn btn-primary btn-lg active" />
                            </div>
                        </div>
                       

                </form>
                    </div>

                </div>
            </div>
        </div>
    </section>
    </div>


@endsection 