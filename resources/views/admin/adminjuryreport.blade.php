@extends('layouts.admin')
@section('content')
<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>  Jury Report </h1>   @if(session('message'))
                                         
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
                                <h3 class="panel-title"> Jury Report </h3>
                              
                            </div>
                            <div class="panel-body">
                                <form method="post" action="{{ url('/admin/juryreport/') }}" class="form-horizontal">
                                {{ csrf_field() }}
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group">   <?php $jurysel =  (isset($_POST['jury']))?$_POST['jury']:'';
                                                                $subcatsel =  (isset($_POST['subcat']))?$_POST['subcat']:'';
                                                                ?>
                                            <label for="name" class="col-md-3 control-label"> Jury Email   </label>
                                            <div class="col-md-9">
                                          <select   class="form-control" name="jury" id="jury">
                                          <option {{ ( $jurysel == 'all')?'selected':"" }} value="all">  All </option>
                                            @foreach($jury as $jurys)
                                                    <option {{ ( $jurysel == $jurys->id)?'selected':"" }}  value="{{ $jurys->id }}">{{ $jurys->email }}</option>                                 
                                            @endforeach                                             
                                                </select>
                                                 </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">  Subcategory  </label>
                                            <div class="col-md-9">
                                          <select   class="form-control" name="subcat" id="subcat">
                                          <option {{ ( $subcatsel == 'all')?'selected':"" }} value="all">  All </option>

                                            @foreach($category as $cate)
                                                    <option {{ ( $subcatsel == $cate->subcategoryid)?'selected':"" }} value="{{ $cate->subcategoryid }}">{{ $cate->subcategoryname}}</option>                                 
                                            @endforeach                                             
                                                </select>
                                                 </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 text-center">
                                                <button class="btn btn-responsive btn-primary btn-sm" type="submit">Submit</button>
                                                <button class="btn btn-responsive btn-primary btn-sm" type="reset">Reset</button>
                                            </div>
                                        </div>
                                        </fieldset>
                                </form>
                                     <div style="height:400px; overflow: scroll;">
                                  
                                       <div class="col-md-12" >
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="livicon" data-name="camera-alt" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Jury Report Total-Report Judge {{count($catentry) }}
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
                                            <th>Jury Email</th>  
                                            <th>Campigan Name</th>
                                            <th>Brand Name</th>
                                            <th>Subcategory Name</th>
                                            <th>Entry Id</th>
                                            <th>Category Entry Id</th>     
                                            <th>Grand Total in %</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($catentry as $entry)   
                                            <tr>
                                                <td>{{$entry->email }}</td>
                                                <td>{{ $entry->campaign_name }}</td>
                                                <td>{{ $entry->entry_brand_name }}</td>
                                                <td>{{ $entry->SubCatName }}</td>
                                                <td>{{ $entry->entryid }}</td>
                                                <td>{{ $entry->cat_entry_id }}</td> 
                                                <td>{{ $entry->GrantTotal_In_100percent }}</td>
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
                                        <!-- Form actions -->
                                         
                                    
                            </div>
                        </div>
                        <!--basic form 2 starts-->
                        
                    </div>
                    <!--md-6 ends-->
                    
                </div>
                <!--main content ends--> </section>
            <!-- content --> </aside>

 
@endsection
