@extends('layouts.admin')

@section('content')

<di<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Add Users</h1>
                 
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
                                    Add New User
                                   
                                </h3>
                                
                            </div>
                            <div class="panel-body">
                                <form method="post" action="{{ url('/admin/adduser') }}" class="form-horizontal">
								{{ csrf_field() }}
                                    <fieldset>
                                        <!-- Name input-->
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Title</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Mr/Mrs" name="stitle" id="stitle" required="">
                                                @if ($errors->has('stitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stitle') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name" class="col-md-3 control-label">Your Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your name" name="name" id="name" required="">
												@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
										<div class="form-group">
                                            <label for="password" class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" placeholder="Your Password" name="password" id="password" required="">
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
                                                <input type="email" class="form-control" placeholder="Your email" name="email" id="email" required="">@if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
										   <!-- Email input-->
                                      
										<div class="form-group">
                                            <label for="organization" class="col-md-3 control-label">Organization </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your Organization" name="organization" id="organization" required="">
												@if($errors->has('organization'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organization') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
										<div class="form-group">
                                            <label for="designation" class="col-md-3 control-label">Designation </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your Designation" name="designation" id="designation" required="">
												@if($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
                                     <div class="form-group">
                                            <label for="department" class="col-md-3 control-label">Department </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your Department" name="department" id="department" required="">
												@if($errors->has('department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('department') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
										
                                       
                                        <div class="form-group">
                                            <label for="mobile" class="col-md-3 control-label">Mobile</label>
                                            <div class="col-md-9">
                                                <input type="tel" class="form-control" placeholder="Your Mobile" name="mobile" id="mobile" required="">@if($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="col-md-3 control-label">Phone</label>
                                            <div class="col-md-9">
                                                <input type="tel" class="form-control" placeholder="Your phone" name="phone" id="phone" required="">@if($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
                                        <!-- Form actions -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <button class="btn btn-responsive btn-primary btn-sm" type="submit">Add User</button>
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
