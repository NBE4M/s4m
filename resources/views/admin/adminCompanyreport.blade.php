@extends('layouts.admin')
@section('content')
<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1> Company wise Entry Report  </h1>   @if(session('message'))
									     
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
                            <div class="panel-heading">
                                <h3 class="panel-title">  Company wise Entry Report </h3>
                            </div>
							
                            <div class="panel-body">
                                    
                                        <!-- Name input-->
                                      
									 <div style="height:500px; overflow: scroll;">
								@foreach($compentry as $cats)	 
                                       <div class="col-md-10" >
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    {{ $cats['compname'].' : Total Entry:- '.$cats['counts'] }}
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
                                                <th>Campaign Name</th>
                                                  <th>Company Name</th>
                                                <th>CATEGORY NAME</th>                          
                                                <th>SUBCATEGORY NAME</th>                                                 
                                                <th>USER EMAIL </th>                                                 
                                               <!--  <th> Edit </th> -->                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cats['detail'] as $entry)	
                                            <tr>
						 
                                                <td> </td>
												<td><a target="_blank" href="{{ url('/admin/entry').'/'.$entry['entryid']  }}"> View - {{ $entry['entryid'] }}</a></td>                 
                                              
                                               <td>{{ $entry['entryname'] }}</td>
                                                <td>{{ $entry['Nameoftheentrantcompany'] }}</td>
                                                <td>{{ $entry['catname'] }}</td>
                                               <td>{{ $entry['SubCatName'] }}</td>
                                               <td>{{ $entry['useremail'] }}</td>
                                              <!--  <td><a target="_blank" href="{{ url('/admin/editentry').'/'.$entry['entryid']  }}">Edit</a></td> -->
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
 
@endsection
