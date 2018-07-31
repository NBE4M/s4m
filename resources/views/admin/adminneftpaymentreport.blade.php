@extends('layouts.admin')
@section('content')
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Admin NEFT Payment Report</h1>
                
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">                                  
                                     Total Payment Entry {{   count($payment)     }}
                                     <button class="btn btn-success btnExport">Export to excel</button>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable dvData" style="overflow: scroll;">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>
                                                <th>User id</th>                                                
                                                <th>User Email</th>
												<th>Name</th>
                                                <th>Company</th>
                                                <th>Address</th>  
                                                <th> Orderid </th>
                                                <th> GST No </th>
                                                <th> Total Amount </th>
                                                <th>Payment Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
								 	@php
									$i = 0
									@endphp
									
								@foreach ($payment as $v)
								@php
						$i++;
						@endphp
                                            <tr>
                                                <td> {{ $i }} </td>
                                                <td> {{ $v->uid }} </td>                     
                                                <td> {{ $v->Email }} </td>
                                                <td> {{ $v->Name }} </td>
                                                <td> {{ $v->Organisation }} </td>
                                                <td> {{ $v->Address }} </td>
                                                <td> {{ $v->OrderNo }} </td>
                                                <td> {{ $v->gst }} </td>
                                                <td> {{ $v->Amount }} </td>
                                                <td> {{ $v->pdate }} </td>
                                            </tr>
                                           @endforeach  

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->
                    </div>
                       
                </div>
            </section>
            <!-- content -->
        </aside>
         <script type="text/javascript">
     $(".btnExport").click(function (e) {
      
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('.dvData').html()));
       e.preventDefault();
   });
   </script>
@endsection
