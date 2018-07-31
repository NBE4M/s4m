@extends('layouts.admin')

@section('content')
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1> Update Jury</h1>
                 
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
                                    Update Jury
                                   
                                </h3>
                                
                            </div>
                            <div class="panel-body">
                                <form method="post" action="{{ url('/admin/addjury/'.$jury->id) }}" class="form-horizontal">
								{{ csrf_field() }}
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <label for="username" class="col-md-3 control-label">User Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your name" name="username" id="username" value="{{ $jury->name }}">
												@if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
										<div class="form-group">
                                            <label for="password" class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your Password" name="password" value="{{$jury->user_pass}}" id="password">
												@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
												</div>
                                        </div>
										
										
										
                                        <!-- Email input-->
                                        <div class="form-group">
                                            <label for="email" class="col-md-3 control-label"> E-mail</label>
                                            <div class="col-md-9">
                                                <input type="text" value="{{ $jury->email }}" class="form-control" placeholder="Your email" name="email" id="email">@if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
                                         <div class="form-group">
                                            <label for="email" class="col-md-3 control-label"> status</label>
                                            <div class="col-md-9">
                                                <input type="text" value="{{ $jury->status }}" class="form-control" name="status" id="status">@if($errors->has('status'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
                                        <!-- Message body -->
                                    
                                        
                                        <!-- Form actions -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                 <button class="btn btn-responsive btn-primary btn-sm" type="submit"> Update Jury</button>
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
