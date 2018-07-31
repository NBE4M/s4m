@extends('layouts.admin')
@section('content')
<!-- <script>
$(document).ready(function(){
  $('.table').dataTable()
});
</script> -->

  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
<aside class="right-side">
            <!-- Content Header (Page header) -->
           
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
                                <h3 class="panel-title">JURY SCORE TOP</h3>
                            </div>
                            
                            <div class="panel-body">
                                    
                                        <!-- Name input-->
                                      
                                     <div class="dvData" id="sortableaaaaaa">
                                @foreach($catentry as $cats)   
                                       <div class="col-md-12" class="ui-state-default">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    {{ $cats['subcatname'] }}
                                   
                                </div>
                            </div>  
                            <div class="portlet-body">
                                <div class="table-scrollable ">
                                    <table class="table table-hover" id="example">
                                        <thead>
                                            <tr>
                                              <th>Entry ID</th>
                                              <th>Cat Entry ID</th>
                                                <th>Campaign Title</th>
                                                <th>Brand Name</th>
                                                <th>Agency Name</th>
                                                <th>Sub Category</th>
                                                <th>Avarage</th>                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php $count = 0; ?>
                                            @foreach($cats['detail'] as $entry) 
                                             <?php if($count == 12) break; ?>
                                            <tr>   
                                                <td><a class="btn default btn-xs purple" href="{{ url('/admin/entry').'/'.$entry['eid']  }}">{{ $entry['eid'] }}</td>
                                                <td>{{ $entry['catentryid'] }}</td>
                                                <td>{{ $entry['campaign_name'] }}</td>
                                                <td>{{ $entry['entry_brand_name'] }}</td>
                                                <td>{{ $entry['agency_name'] }}</td>
                                                <td>{{ $entry['subcategoryname'] }}</td>
                                                <td>{{ $entry['avg_score'] }}</td>           
                                            </tr>
                                              <?php $count++; ?>
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
   <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>

 <!--  <script>
  $( function() {
    $( "#sortableaaaaaa" ).sortable();
    $( "#sortableaaaaaa" ).disableSelection();
  } );
  </script> -->
   

<style>
.label {
padding: 0px 10px 0px 10px;
border: 1px solid #ccc;
-moz-border-radius: 1em; /* for mozilla-based browsers */
-webkit-border-radius: 1em; /* for webkit-based browsers */
border-radius: 1em; /* theoretically for *all* browsers*/
}
.label.lightblue {
background-color: #99CCFF;
}
#external_filter_container_wrapper {
margin-bottom: 20px;
}
#external_filter_container {
display: inline-block;
}
</style>

@endsection
