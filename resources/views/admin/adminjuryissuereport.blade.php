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
                                       Entry Issue/Recuse -  Total - @if(isset($jury)){{   count($jury)     }}@else 0 @endif
                                     <button class="btn btn-success btnExport">Export to excel</button>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable dvData" style="overflow: scroll;">
                                      <table class="table table-hover sortable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Campaign Name</th>
                                                <th>Type</th>
                                                <th>Comment</th>
                                                <th>entry id</th>
                                                 <th>category Entry id</th>
                                               <th> Delete </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @if(isset($jury))

                                    @php
                                    $i = 0
                                    @endphp
                                    @foreach ($jury as $v)
                                         @php
                        $i++;
                        @endphp   
                                            
                                            <tr id="{{ $v->id }}">
                                                <td>{{ $i }}</td>
                                                <td>{{ $v->email }}</td>
                                                <td>{{ $v->campaign_name }}</td>
                                                <td>{{ $v->etype }}</td>
                                                <td style="width: 30%;">{{ $v->comment }}</td>
                                                <td>{{ $v->cat_entry_id}}</td>
                                                <td>{{ $v->entryid}}</td>
                                               <td>
                                               @if($v->etype=='Recuse') 
                                                   
                                                    @else
                                                    <a class="btn default btn-xs purple" href="{{ url('/admin/issuedelete/'.$v->id)  }}">
                                                        <i class="fa fa-trash-o"></i>
                                                        Delete
                                                    </a>
                                                    @endif
                                                </td>  
                                            </tr>
                                           @endforeach  
@endif
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
