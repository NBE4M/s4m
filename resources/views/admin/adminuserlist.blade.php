@extends('layouts.admin')
@section('content')
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Users List</h1>
                
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                 <div class="caption">                                  
                                     Total User {{   count($users)     }}
                                     <button class="btn btn-success btnExport">Export to excel</button>
                                </div>
                            </div>
                            <div class="portlet-body">
                                
                                <div class="table-scrollable dvData" style="overflow: scroll;height: 450px;">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>
                                                <th>id</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Mobile</th>
                                                <th>Password</th>
                                                <th>Company</th>
                                                <th>Designation</th>
                                                <th>Department</th>
                                                <th>Company Address</th>
                                                <th>Alternative Contact name</th>
                                                <th>Alternative Contact designation</th>
                                                <th>Alternative Contact Landlineno</th>
                                                <th>Alternative Contact mobile</th>
                                                <th>Alternative Contact email</th> 
                                                <th>Facebook</th>
                                                <th>twiterh</th>
                                                <th>GST NO</th>
                                                <th>Pincode</th>
                                                <th>city</th>
                                                <th>How to hear</th>
                                                  <th>Status</th>
                                                <th> Edit </th>
                                            </tr>
                                        </thead>
                                        <tbody>
								 	@php
									$i = 0
									@endphp
									
								@foreach ($users as $v)
								@php
						$i++;
						@endphp
                                            <tr>
                                                <td>{{ $i }}</td>
                                                <td>{{ $v->id }}</td>
                                                <td>{{ $v->fname }} {{ $v->lname }}</td>
                                                <td>{{ $v->email }}</td>
                                                 <td>{{ $v->mobile }}</td>
                                                <td>{{ $v->user_pass }}</td>
                                                <td>{{ $v->companylegalname }}</td>
                                                <td>{{ $v->designation }}</td>
                                                 <td>{{ $v->department }}</td>
                                                 <td>{{ $v->companyaddress }}</td>
                                                 <td>{{ $v->sname }}</td>
                                                  <td>{{ $v->sdesignation }}</td>
                                                 <td>{{ $v->sLandlineno }}</td>
                                                  <td>{{ $v->smobile }}</td>
                                                 <td>{{ $v->semail }}</td>
                                                  <td><a href="{{ $v->Facebook }}" target="_blank">{{ $v->Facebook }}</a></td>
                                                 <td><a href="{{ $v->twiterh }}" target="_blank">{{ $v->twiterh }}</a></td>
                                                  <td>{{ $v->gst }}</td>
                                                 <td>{{ $v->Pincode }}</td>
                                                  <td>{{ $v->city }}</td>
                                                 <td>{{ $v->howtohear }}</td>
                                                 <td>{{ $v->status }}</td>
                                               
                                               <td> 
                                                    <a class="btn default btn-xs purple" href="{{ url('/admin/adduser/'.$v->id)  }}">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                </td>  
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
