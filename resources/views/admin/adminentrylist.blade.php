@extends('layouts.admin')
@section('content')
 <!-- <script>
$(document).ready(function(){
  $('#example').dataTable()
});
</script> -->
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Entry List</h1>
                
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">                                  
                                     Total Entry {{$counte}}
                                      <button class="btn btn-success btnExport">Export to excel</button>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable dvData" style="overflow-x: scroll;">
                                    <table class="table table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>
                                                <th>User id</th>                              
                                                <th>user Email</th>
                                                 <th>Brand</th>
                                                  <th>Parent Company for the Brand</th>
                                                 <th>Campaign Name</th>
                                                <th>Name of Entrant Company</th>
                                                <th>Agency Mobile</th>
                                                 <th>Entry Date</th>
                                                 <td>Contact Person</td>
                                                 <td>Contact Designation</td>
                                                 <td>Contact Organization</td>
                                                 
                                                 <td>Contact E-mail</td>
                                                 <td>Contact Mobile</td>
                                                <th>Details </th>
                                               <!--  <th>Edit </th> -->
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
                                                <td>{{ $v->userid }}</td>                      
                                                <td>{{ $v->email }}</td>
                                                <td> {{ $v->entry_brand_name }}</td>
                                                <td> {{ $v->entry_company_brand_name }}</td>
                                                <td> {{ $v->campaign_name }}</td>
                                                <td>{{ $v->entrant_name_of_organization}}</td>
                                                <td>{{ $v->agency_mobile }}</td>
                                                <td>{{ $v->created_at }}</td>
                                                <td>{{ $v->brand_contact }}</td>
                                                <td>{{ $v->brand_desig }}</td>
                                                <td>{{ $v->brand_orag }}</td>
                                                
                                                <td>{{ $v->brand_email }}</td>
                                                <td>{{ $v->brand_mobile }}</td>
                                                <td><a class="btn default btn-xs purple" href="{{ url('/admin/entry').'/'.$v->id  }}">
                                                <i class="fa fa-detail"></i>  Details
                                                </a> </td>
										
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
