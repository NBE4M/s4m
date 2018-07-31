@extends('layouts.admin')
@section('content')
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
               <h1>Pages List</h1>
                
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">                                  
                                      page List -  Total page - {{   count($data)     }}
                                       
                                     <button class="btn btn-success btnExport">Export to excel</button>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-scrollable dvData" style="overflow: scroll;">
                                  <table class="table table-bordered sortable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Title</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      @php
                                      $i = 0;
                                      $i++;
                                      @endphp 
                                    @foreach($data as $v)
            						
                                     
                                    <tr id="{{ $v->id }}">
                                                <td>#</td>
                                                <td><a href="{{ url('/admin/addpage/'.$v->id)  }}">
                                                       {{ $v->title }}
                                                    </a></td>
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
