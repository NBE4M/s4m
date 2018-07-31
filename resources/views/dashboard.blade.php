@extends('layouts.app')

@section('content')
<style type="text/css">
    
</style>
 <div class="container">
          <div class="row">
              <div class="col-lg-12">
        <div class="entry-form">   
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">DASHBOARD</div>
            </div> 
            <div class="container">
  <ul>
    <button class="btn btn-success" id="entry" >ENTRY DASHBOARD</button>
    <button class="btn btn-success" id="entrynominee" style="    float: right;">ENTRYNOMINEE DASHBOARD</button>
  </ul>

  <div class="tab-content">
    <div id="entryshow">
     <div class="col-md-12 cw col-centered">

                    <center>
                    <span id="ctl00_ContentPlaceHolder1_nofound"></span>
                    </center>
                    <div>
                    <table cellspacing="0" cellpadding="4" border="1" style="border-color:#000DDD;border-width:1px;border-style:None;width:100%;border-collapse:collapse;" id="ctl00_ContentPlaceHolder1_GridView1" rules="all" class="table table-bordered">
                    <tbody><tr class="heading">
                    <th style="width:2%;" scope="col">S.no.</th><th style="width:10%;" scope="col">Entry / Campaign Name </th><th style="width:10%;" scope="col">Entrant Company</th><th style="width:10%;" scope="col">No of Entry</th><th style="width:10%;" scope="col">Entry Date</th><th style="width:5%;" scope="col">Action</th>
                    </tr>  @php
                    $i = 0;
                    @endphp
                    @foreach ($entry as $v)
                    @php
                    $i++;
                    @endphp
                    <tr style="color:#330099;background-color:#CCCCCC;" class="table-row">
                    <td>{{ $i }}</td>
                    <td>{{ $v->campaign_name }}</td>
                    <td>{{ $v->entrant_name_of_organization }}   </td>
                    <td> {{ $v->total_entry }} </td>
                    <td>{{ $v->date_of_Start_of_Activity }}</td>  
                    <td>@if($pcounts > 0)<a title="View" href="{{ url('/viewentry').'/'.$v->id }}"><span class="glyphicon glyphicon-eye-open"> </span><i class="fa fa-eye" aria-hidden="true"></i></a>@elseif($PaymentCheque > 0)<a title="View" href="{{ url('/viewentry').'/'.$v->id }}"><span class="glyphicon glyphicon-eye-open"> </span><i class="fa fa-eye" aria-hidden="true"></i></a>@elseif($PaymentNEFT > 0)<a title="View" href="{{ url('/viewentry').'/'.$v->id }}"><span class="glyphicon glyphicon-eye-open"> </span><i class="fa fa-eye" aria-hidden="true"></i></a>@else<a href="{{ url('/entry').'/'.$v->id }}"><span class="glyphicon glyphicon glyphicon-edit"></span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a><a title="View" href="{{ url('/viewentry').'/'.$v->id }}"><span class="glyphicon glyphicon-eye-open"> </span><i class="fa fa-eye" aria-hidden="true"></i></a>@endif</td>

                    </tr>@endforeach
                    </tbody></table>
                    </div>

                    <div style="margin-left: auto; margin-right: auto; float: none;
                    margin-bottom: 1%; margin-top: 2%;" class="col-md-5 text-center" id="">
                    @if($pcounts > 0)
                               <!-- if payment has been done -->
                                <div class="alert alert-success">
                                <strong>Success!</strong> payment has been done.
                                </div>
                                 @elseif($PaymentCheque > 0)
                               <!-- if payment has been done -->
                                <div class="alert alert-success">
                                <strong>Success!</strong> payment has been done.
                                </div>
                                 @elseif($PaymentNEFT > 0)
                               <!-- if payment has been done -->
                                <div class="alert alert-success">
                                <strong>Success!</strong> payment has been done.
                                </div>
                    @else
                    <a href="{{ url('/entry') }}">
                    <input type="button" value="Add Entries" class="btn btn-danger pull-left">
                    </a> &nbsp;
                    <span style="line-height: 35px; color: #FFF; font-size: 16px;"><strong></strong></span> &nbsp; 
                    <a href="{{ url('/paymentoption') }}">
                    <input type="button" value="Make Payment" class="btn btn-danger pull-right">
                    </a> 
                    @endif
                    @if(Session::has('message'))
                    <div class="alert alert-info">
                    {{ Session::get('message') }}
                    </div>
                    @endif 
                    </div>

                    </div>
    </div>
    <div id="entrynomineeshow" style="display: none;">
     <div class="col-md-12 cw col-centered">

                    <center>
                    <span id="ctl00_ContentPlaceHolder1_nofound"></span>
                    </center>
                    <div>
                    <table cellspacing="0" cellpadding="4" border="1" style="border-color:#000DDD;border-width:1px;border-style:None;width:100%;border-collapse:collapse;" id="ctl00_ContentPlaceHolder1_GridView1" rules="all" class="table table-bordered">
                    <tbody><tr class="heading">
                    <th style="width:2%;" scope="col">S.no.</th><th style="width:10%;" scope="col">Nominee Name</th><th style="width:10%;" scope="col">Name of Entrant Company</th><th style="width:10%;" scope="col">Subcategory Name</th><th style="width:10%;" scope="col">Entry Date</th><th style="width:5%;" scope="col">Action</th>
                    </tr>  @php
                    $i = 0;
                    @endphp
                    @foreach ($entrynominee as $v1)
                    @php
                    $i++;
                    @endphp
                    <tr style="color:#330099;background-color:#CCCCCC;" class="table-row">
                    <td>{{ $i }}</td>
                    <td>{{ $v1->Nominee_name }}</td>
                    <td>{{ $v1->company }}   </td>
                    <td>{{ $v1->subcategoryname }}</td>
                      <td>{{ $v1->created_at }}</td> 
<td><span class="glyphicon glyphicon glyphicon-edit"></span><span class="glyphicon glyphicon-eye-open"></span><a href="{{ url('/entrynominee').'/'.$v1->id }}"><span class="glyphicon glyphicon glyphicon-edit"></span>Edit</a><a title="View" href="{{ url('/viewentrynominee').'/'.$v1->id }}"><span class="glyphicon glyphicon-eye-open"> </span>View</a></td>
                    </tr>@endforeach
                    </tbody></table>
                    </div>
                    </div>
    </div>
  </div>
</div>  
            <!--form-->
                    
                        </div>
                        <!--form-->
                    </div>
                </div></div></div></section>
<script type="text/javascript">
    $("#entry").click(function(){
    $("#entryshow").show();
    $("#entrynomineeshow").hide();
});

$("#entrynominee").click(function(){
   $("#entryshow").hide();
    $("#entrynomineeshow").show();
});
</script>

<script>
function myFunction() {
    window.print();
}
</script>
 
@endsection
