@extends('layouts.admin')
@section('content')
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Category Entry List</h1>

            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <center>
                                    <div class="caption" >                                  
                                       Total Entries - @if(isset($total)){{   $total    }}@else 0 @endif
                                     
                                </div>
                                </center>
                                
                                <div class="caption">                                  
                                       Entry Unavailable for Jury - @if(isset($entrystatus)){{   count($entrystatus)     }}@else 0 @endif
                                   <a href="{{url('/admin/alredyassign')}}" style="color: black; float: right;">Entry Available for Jury - @if(isset($avl)){{   $avl  }}@else 0 @endif</a>  
                                </div>

                                
                            </div>
                            <div class="portlet-body">
                                <form action="{{url('/admin/update')}}" role="form" method="POST">
                                <div class="table-scrollable dvData" style="overflow: scroll;">
                                      <table class="table table-hover sortable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Campaign Name</th>
                                                <th>Subcategory name</th>
                                                <th>Company name</th>
                                                <th>Brand name</th>
                                                <th>Entry date</th>
                                               <th><p>Select All</p><p><input type="checkbox" class="ckbCheckAll" value="checkbox1" id="selectall"/></p></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @if(isset($entrystatus))

                                    @php
                                    $i = 0
                                    @endphp

                                    @foreach ($entrystatus as $v)
                                    
                                         @php
                        $i++;
                        @endphp   

                        <tr class="checkBoxes" id="{{ $v->id }}">
                                                <td>{{ $i }}</td>
                                                <td>{{ $v->campaign_name }}</td>
                                                <td>{{ $v->subcategoryname }}</td>
                                                 <td>{{ $v->entrant_name_of_organization }}</td>
                                                  <td>{{ $v->entry_brand_name }}</td>
                                                <td>{{ $v->created_at }}</td>
                                               <td>
                                               
                                                    <input type="checkbox" class="checkBoxes" name="checkItem[]"  value="{{ $v->id }}" />
                                                  
                                                </td>  
                                            </tr>
                                           @endforeach 
                                            
@endif
                                        </tbody>
                                    </table>

                                </div>
                                <center>
                                    <button type="submit" >Update</button>
                                </center>
                                 
                                </form>

                            </div>
                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->
                    </div>
                       
                </div>
            </section>
            <!-- content -->
        </aside>
         <script type="text/javascript">
    $(function () {
    var $tblChkBox = $(".checkBoxes input:checkbox");
    $(".ckbCheckAll").on("click", function () {
        $($tblChkBox).prop('checked', $(this).prop('checked'));
    });
});
   </script>

@endsection
