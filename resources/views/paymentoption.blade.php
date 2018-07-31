

@extends('layouts.app')

@section('content')

     <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-2">
        <div class="entry-form">   
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">Payment Option</div>
            </div>
            <div class="panel-body">   
    <section id="Payment" class="col-md-12 col-xs-12">
        <div class="container bcw">
            <div class="row">
                <div class="col-lg-12 col-xs-12">
                     <div class="col-md-12 col-sm-12 col-xs-12 text-center" style="margin-top: 0px;">
                                        <br>
                                    <a href="{{ url('/makecheckpayment') }}" class="btn btn-danger">Cheque payment</a> &nbsp; <a href="{{ url('/makeneftpayment') }}" class="btn btn-danger">NEFT Payment</a> &nbsp; <a href="{{ url('/makeonlinepayment') }}" class="btn btn-danger">Online Payment</a>
                                        <br>
                                        <br>
                     </div>
                </div>
            </div>
        </div>
    </section>

   </div></div></div></div></div></div>
    @endsection