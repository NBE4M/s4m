@extends('layouts.app')

@section('content')
<div class="container">
            <div class="row">
                <div class="col-lg-8 offset-2">
                <div class="register-form">  
                 <div class="panel panel-default">
               

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
 <?php 
if (!Auth::guest()){
if(Auth::user()->role == 'admin'){
  $durl = url('/admin');
  $url = '/admin';
}elseif(Auth::user()->role == 'jury'){
  $durl = url('/judge');
  $url = '/judge';
}else{
  $durl = url('/dashboard');
  $url = '/dashboard';
}}?> 
                    You are logged in!<br><b>Click on <a href="{{ url($url) }}">"DASHBOARD"</b></a> (given on the right hand side top corner) <b>to view the entry.</b>
                </div>
            </div>
        </div>
    </div>
</div>
   
@endsection
