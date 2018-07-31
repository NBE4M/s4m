@extends('layouts.admin')
@section('content')
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
               <h1>Jury List</h1>
                
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">                                  
                                      Jury List -  Total Jury - {{   count($jury)     }}
                                        <span style="float: right;">Judge Entry List 1st  -  Total - {{   count($usersentrysum1) }}</span><br>
                                          <span style="float: right;">Judge Entry List 2nd -  Total - {{   count($usersentrysum2) }}</span> <br>
                                        <span style="float: right;">Judge Entry List 3rd -  Total - {{   count($usersentrysum3) }}</span> 
                                           
                                       
                                     <button class="btn btn-success btnExport">Export to excel</button>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-scrollable dvData" style="overflow: scroll;">
                                  <table class="table table-bordered sortable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 <th>Edit</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                                 <th>Status</th>
                                              <th> Enrty Judge By Jury </th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @php
									   $i = 0;
									     $i++;
            						@endphp 
                          
                                    @foreach($jury as $v)
                                    <tr id="{{ $v->id }}">
                                                <td>#</td>
                                                  <td> 
                                                    <a class="btn default btn-xs purple" href="{{ url('/admin/addjury/'.$v->id)  }}">
                                                        <i class="fa fa-edit"></i>
                                                        Edit
                                                    </a>
                                                </td> 
                                                <td>{{ $v->sname }}</td>
                                                <td>{{ $v->email }}</td>
                                                <td>{{ $v->user_pass }}</td>
                                                <td>{{ $v->status }}</td>
                                                 <td>{{ $v->count }}</td>
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
