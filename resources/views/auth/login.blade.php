@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-2">
                <div class="register-form">  
                 <div class="panel panel-default">
                <div class="panel-heading">
                        <div class="panel-title">Indian Digital Marketing Awards (IDMA) 2018 </div>
                        </div>
                        <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                       <p style="text-align: center;"><a style="color: #156b94;
    font-weight: bold;" data-toggle="modal" href="javascript:void(0)" onclick="openLoginModal();">Click Here</a> to start online screening</p>
                    </form>
                </div>
            </div>
        </div>
          <div class="col-md-3 col-xs-3">
        </div>
    </div>
</div>
@endsection
