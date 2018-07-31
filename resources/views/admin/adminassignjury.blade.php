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
                                <h3 class="panel-title">
                                    Assign Jury 
                                   
                                </h3>
                              
                            </div>
                            <div class="panel-body">
                                <form method="post" action="{{ url('/admin/juryassign/') }}" class="form-horizontal">
                                {{ csrf_field() }}
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Select Jury</label>
                                            <div class="col-md-9">
                                          <select multiple="" class="form-control" name="jury[]" id="jury">
                                            @foreach($jury as $jurys)
                                                    <option value=" {{ $jurys->id }} ">{{ $jurys->email }}</option>                                  
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
                                     {{ $cats['useremail'].' : Total Entry:- '.$cats['counts'] }}
                                </div>
                            </div>  
                            <div class="portlet-body">
                                <div class="table-scrollable">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                               <th> </th>
                                                <th>Entry CAT ID</th>
                                                <th>Entry ID</th>
                                                <th>Campaign Name</th>
                                                <th>CATEGORY NAME</th>                         
                                                <th>SUBCATEGORY NAME</th>                                                 
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach($cats['detail'] as $entry)  
                                            <tr>
                         
                                                <td><input class="book_{{ $entry['subcategoryid']}}" type="checkbox" name="eid[]" id="eid" value="{{ $entry['entryid'].'!~'.$entry['entrycatid'].'!~'.$entry['subcategoryid'] }}"></td>
                                                <td>{{ $entry['entrycatid'] }}</td> 
                                                <td>{{ $entry['entryid'] }}</td>        
                                                <td>{{ $entry['entryname'] }}</td>
                                               <td>{{ $entry['categoryname'] }}</td>
                                               <td>{{ $entry['subcategoryname'] }}</td>
                                                 
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
                                                <button class="btn btn-responsive btn-primary btn-sm" type="submit">Submit</button>
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
