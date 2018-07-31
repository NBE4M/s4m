@extends('layouts.app')

@section('content')
                     <div class="container">
          <div class="row">
              <div class="col-lg-12">
        <div class="entry-form">   
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">ENTRY DETAILS</div>
                    <div class="pre-scrollableS">
                        <br><br>
                      <p>TOTAL ENTRIES JUDGED:-<b>{{ count($judgedata) }}</b></p>

                        <div class="col-md-12 top25">
                            <p class="f23">
                             <h2 style="text-align: center;font-size: 22px;color: #068ca7;;padding-bottom: 5px;text-transform: uppercase;font-weight: bold;border-bottom: solid 1px;">JUDGE DASHBOARD</h2>
                            </p>
                        </div>

                        <!--form-->
                        <div class="col-md-12 col-centered">
                           <a href="{{ url('/entry_information') }}"><input type="button" value="CONTINUE SCORING" class="btn btn-danger"></a><br><br>
                           <p></p>
                            <div>
                                @if (session('alert'))
                            <div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong>  {{ session('alert') }}.
                           
                            </div>
                            @endif
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                      <th>Action</th>
                                      <th>Sr No</th>
                                     <th>Subcategory Name</th>
                                     <th>Campiagn Name</th>
                                     <th>Brand Name</th>
                                    <th>Score %</th>
                                    </tr>
                                    </thead>
                                <tbody>
                                     @php
                                    $i = 0
                                    @endphp
                                    @foreach ($judgedata as $data)
                                    @php
                                    $i++;
                                    @endphp
                                    <tr>
                                     <td><a href="{{ url('/entry_updation').'/'.$data->JuryScoreID  }}">Edit</a></td>
                                         <td>{{ $i }}</td>
                                      <td>{{ $data->subcategoryname}}</td>
                                        <td>{{ $data->campaign_name}}</td>
                                          <td>{{ $data->entry_brand_name}}</td>
                                      <td><div class="progress">
  <div class="progress-bar" role="progressbar" style="width: {{ $data->GrantTotal_In_100percent }}%;">{{ $data->GrantTotal_In_100percent }}%</div>
</div></td>
                                    @endforeach
                                    </tr>
                                </tbody>

                                </table>
                             <!--    <center>
                        <input type="submit" name="Button2" value="Please click here if you're done with the judging and wish to send scores to Enba Awards 2017 admin" onclick="javascript:return clickconfirm();" id="{{$data->juryID}}" class="btn btn-danger juryupdate">
                 
                 </center> -->
                            </div>
                        </div>
                                

                        </div>
                        <!--form-->
                    </div>
                </div>
    </section>
@endsection
