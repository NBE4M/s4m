@extends('layouts.admin')
@section('content')
<style>
.ts{ margin:0; padding:5px; border-bottom:1px solid #4e4e4e;}
#page-wrapper{ display:block; margin:0 0 0 250px;}
.panel-footer{color: #505763;}
</style>
 <div id="page-wrapper">
           @if(Auth::user()->email  == 'evente4m@gmail.com')
          <div class="row" style="margin-top:20px;">
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                   <h3 class="text-center ts"> Total Registerd</h3>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="huge">{{$contval[0]->total_register}}</div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                            	<a href="https://e4mevents.com/idma-2018/admin/userslist">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                </div>
                
                
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                   <h3 class="text-center ts">Total Entry Main Category</h3>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="huge">{{$contval[0]->total_entry_main}}</div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                            	<a href="https://e4mevents.com/idma-2018/admin/adminuserentryreport">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                </div>
                
                
                
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                   <h3 class="text-center ts">Total Nomination Entry</h3>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="huge">{{$contval[0]->total_entry_nomination}}</div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                            	<a href="https://e4mevents.com/idma-2018/admin/catentrylist">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                </div>
                
                
                 <div class="col-lg-4 col-md-4">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                   <h3 class="text-center ts">Total Delegate Registered</h3>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="huge">{{$contval[0]->total_delegate}}</div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                            	<a href="https://e4mevents.com/idma-2018/admin/admindelpaymentreport">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                </div>
                
                
                 <div class="col-lg-4 col-md-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                   <h3 class="text-center ts">Total Payment</h3>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="huge">{{$contval[0]->total_payment}}</div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                            	<a href="https://e4mevents.com/idma-2018/admin/adminpaymentreport">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                </div>
                
                
                <div class="col-lg-4 col-md-4">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-12">
                                   <h3 class="text-center ts">Jury</h3>
                                </div>
                                <div class="col-xs-12 text-center">
                                    <div class="huge">Comming Soon</div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        
                            <div class="panel-footer">
                            	<a href="">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span></a>
                                <div class="clearfix"></div>
                            </div>
                        
                    </div>
                </div>
                
                
                
                
                
                </div>
         @endif
         </div>
@endsection
