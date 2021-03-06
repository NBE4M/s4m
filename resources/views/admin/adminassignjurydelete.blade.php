@extends('layouts.admin')
@section('content')
<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1> Assign Jury </h1>   @if(session('message'))
									     
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
                                <h3 class="panel-title">    Assign Jury </h3>
                              <script>
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
 
	  $('#juryd').change(function() {
  // set the window's location property to the value of the option the user has selected
/*  window.location = 'http://localhost/idma-2016/admin/adminjurydeleteassign/'+$(this).val(); */
 window.location = 'http://e4mevents.com/idma-2016/admin/adminjurydeleteassign/'+$(this).val();
	});  
});
	   </script>
                            </div>
                            <div class="panel-body">
                                <form method="post" action="{{ url('/admin/adminjurydeleteassign/'.$id) }}" class="form-horizontal">
								{{ csrf_field() }}
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Select Jury</label>
                                            <div class="col-md-9">
                                          <select class="form-control" name="juryd" id="juryd">
										  <option value="">Select Jury</option>
											@foreach($jury as $jurys)
													<option {{ $id==$jurys->id?'selected':'' }} value="{{ $jurys->id }}">{{ $jurys->name }}</option>									
											@endforeach												
												</select>
												 </div>
                                        </div>
									 <div style="height:400px; overflow: scroll;">
								@foreach($catentry as $cats)	 
                                       <div class="col-md-10" >
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    {{ $cats['SubCatName'].' -- '.$cats['catname'] }}
                                </div>
                            </div>  
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th><input type="checkbox" class="checkAll" name="checka" id="checkAll_{{ $cats['SubCatId']}}" value="all"></th>
                                                <th>Entry ID</th>
                                                <th>EntryName</th>
                                                <th>CompanyName</th>                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cats['entrlist'] as $entry)	
                                            <tr>
						 
                                                <td><input class="book_{{ $cats['SubCatId']}}" type="checkbox" name="eid[]" id="eid" value="{{ $entry['eid'].'!~'.$cats['SubCatId'] }}"></td>
												<td>{{ $entry['eid'] }}</td>                                                
                                                <td>{{ $entry['EntryName'] }}</td>
                                               <td>{{ $entry['Nameoftheentrantcompany'] }}</td>
                                                 
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
                                        <!-- Form actions -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-responsive btn-primary btn-sm" type="submit">Delete</button>
                                                <button class="btn btn-responsive btn-primary btn-sm" type="reset">Reset</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <!--basic form 2 starts-->
                        
                    </div>
                    <!--md-6 ends-->
                    
                </div>
                <!--main content ends--> </section>
            <!-- content --> </aside>
 
@endsection
