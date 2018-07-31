@extends('layouts.admin')
@section('content')
<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1> User wise Entry Report  </h1>   @if(session('message'))
									     
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
                              <input type="button" onclick="tableToExcel('dvData', 'W3C Example Table')" value="Export to Excel" class="btn btn-success" style="float: right;">
                                <h3 class="panel-title">  User wise Entry Report </h3>
                            </div>
							
                            <div class="panel-body" >
                                        <!-- Name input-->
									 <div  class="dvData" id="dvData" style="height:400px; overflow: scroll;">
								@foreach($usersentry as $cats)	 
                                       <div class="col-md-10">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    {{ $cats['useremail'].' : Total Entry:- '.$cats['counts'] }}
                                   
                                </div>
                            </div>  
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-hover" >
                                        <thead>
                                            <tr>
                                                <th> </th>
                                                <th>Entry ID</th>
                                                <th>CATEGORY NAME</th>                        
                                                <th>SUBCATEGORY NAME</th>
                                                 <th>CAMPIAGN NAME</th>                      
                                                <th>USER EMAIL </th>                            
                                                <th> Edit </th>                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($cats['detail'] as $entry)	
                                            <tr>						 
                                                <td> </td>
												<td><a target="_blank" href="{{ url('/admin/entry').'/'.$entry['entryid']  }}"> View - {{ $entry['entryid'] }}</a></td><td>{{ $entry['categoryname'] }}</td>
                                               <td>{{ $entry['subcategoryname'] }}</td>
                                               <td>{{ $entry['entryname'] }}</td>
                                               <td>{{ $cats['useremail'] }}</td>               
                                               <td><a target="_blank" href="{{ url('/admin/editentry').'/'.$entry['entryid']  }}">Edit</a></td>                                                 
                                            </tr>
                                            @endforeach	
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->
                    </div>
                    @endforeach
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
 var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
  </script>
@endsection
