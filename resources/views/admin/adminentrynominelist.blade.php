@extends('layouts.admin')
@section('content')
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
                                     Total Entry {{   count($users)     }}
                                      <button class="btn btn-success btnExport">Export to excel</button>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable dvData">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>
                                                <th>User name</th>                              
                                                <th>Nominee name</th>
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
                                                <td>{{ $v->fname }} {{ $v->lname }}</td>
                                                <td>{{ $v->Nominee_name }}</td>
                                               
                                               <td><a class="btn default btn-xs purple" href="{{ url('/admin/entrynominee').'/'.$v->id  }}">
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
