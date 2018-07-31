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
                                       Entry Available for Jury - @if(isset($alrdy)){{   count($alrdy)     }}@else 0 @endif

                                   <a href="{{url('/admin/avaibleentry')}}" style="color: black; float: right;"><i class="fa fa-hand-o-right fa-lg " aria-hidden="true"></i> Entry Unavailable for Jury - @if(isset($avl)){{   $avl  }}@else 0 @endif</a>  
                                </div>
                            </div>
                            <div class="portlet-body">
                              
                                <div class="table-scrollable dvData" style="overflow: scroll;">
                                      <table class="table table-hover sortable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NameDDD</th>
                                                <th>Subcategory name</th>
                                                <th>Cat Entry Id</th>
                                               <!-- <th><p>Select All</p><p><input type="checkbox" class="ckbCheckAll" value="checkbox1" id="selectall"/></p></th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @if(isset($alrdy))

                                    @php
                                    $i = 0
                                    @endphp

                                    @foreach ($alrdy as $v)
                                    
                                         @php
                        $i++;
                        @endphp   

                        <tr class="checkBoxes" id="{{ $v->id }}">
                                                <td>{{ $i }}</td>
                                                <td>{{ $v->campaign_name }}</td>
                                                <td>{{ $v->subcategoryname }}</td>
                                                <td>{{ $v->id }}</td>
                                               <!-- <td>
                                               
                                                    <input type="checkbox" class="checkBoxes" name="checkItem[]"  value="{{ $v->id }}" />
                                                  
                                                </td>   -->
                                            </tr>
                                           @endforeach 
                                            
@endif
                                        </tbody>
                                    </table>

                                </div>
                                <center>
                                    <a href="{{url('/admin/avaibleentry')}}" type="button" >Back</a>
                                </center>
                                 
                                

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
