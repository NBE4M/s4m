@extends('layouts.admin')
@section('content')
<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1> Category wise Entry Report  </h1>   @if(session('message'))
									     
								  <div class="alert alert-success">
  <strong>Success!</strong> {{session('message')}}  
</div>
									@endif            
            </section>
            <!--section ends-->
            <section class="content">
                <!--main content-->
                <div class="row">
                    <!--row starts-->
                    <div class="col-lg-12">
                        <!--lg-6 starts-->
                        <!--basic form starts-->
                        <div id="hidepanel1" class="panel panel-primary">
                             <div class="panel-heading" style="min-height: 47px;">
                                <button class="btn btn-success btnExport" style="float: right;">Export to excel</button>
                                <h3 class="panel-title">  Sub Category wise Entry Report </h3>
                            </div>
							
                            <div class="panel-body">
                                    
                                        <!-- Name input-->
                                      
									 <div class="dvData" style="height:400px; overflow: scroll;">
								@foreach($catentry as $cats)	 
                                       <div class="col-md-10" >
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    {{ $cats['subcategoryname'].' : Total Entry:- '.$cats['counts'] }}
                                </div>
                            </div>  <script>
$(document).ready(function() {
	 // alert('sssssssssssss');
	$(".checkAll").click(function () {
	var ids = $(this).attr('id'); 
	var arr = ids.split('_');
	var idss = arr[1];
	//alert(ids+'-----'+arr[1]);
		if ($("#"+ids).is(':checked')) {
			$(".book_"+idss).prop("checked", true);
		} else {
			$(".book_"+idss).prop("checked", false);
		}
	});
});
	   </script>
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th> </th>
                                                <th>Entry ID</th>
                                                <th>Category Entry ID</th>
                                                <th>Entry Name</th>
                                                <th>SUBCATEGORY NAME</th> 
                                                <th>CATEGORY NAME</th>     
                                                <th>User Email</th>                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cats['detail'] as $entry)	
                                            <tr>
                                                <td></td>
												<td><a target="_blank" href="{{ url('/admin/entry').'/'.$entry['entryid']  }}"> View - {{ $entry['entryid'] }}</a></td>  
                                                 <td>{{ $entry['catentryid'] }}</td>              
                                                <td>{{ $entry['entryname'] }}</td>
                                               <td>{{ $entry['subcategoryname'] }} {{ $entry['region'] }}</td>
                                                <td>{{ $entry['categoryname'] }}</td>
                                                  <td>{{ $entry['email'] }}</td>
                                            </tr>
                                            @endforeach	
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->
                    </div>@endforeach
						</div>
                                      
                            </div>
                        </div>
                        <!--basic form 2 starts-->
                        
                    </div>
                    <!--md-6 ends-->
                    
                </div>
                <!--main content ends--> </section>
            <!-- content --> </aside>
  <script type="text/javascript">
     $(".btnExport").click(function (e) {
      
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('.dvData').html()));
       e.preventDefault();
   });
   </script>
@endsection
