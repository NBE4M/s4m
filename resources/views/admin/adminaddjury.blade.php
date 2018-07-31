@extends('layouts.admin')

@section('content')

<di<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Add Jury</h1>
                 
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
                                    Add New Jury
                                   
                                </h3>
                                
                            </div>
                            <div class="panel-body">
                                <form method="post" action="{{ url('/admin/addjury') }}" class="form-horizontal">
								{{ csrf_field() }}
                                    <fieldset>
                                        <!-- Name input-->
                        <div class="form-group">
                        <label for="" class="col-sm-3 control-label">Title <span class="star">*</span></label>
                        <div class="col-sm-8">
                            <select name="title" class="form-control" required="">
    <option value=""></option>
    <option value="Mr.">Mr</option>
    <option value="Ms.">Ms</option>

</select>
                        </div>
                        
                    </div>

                                        <div class="form-group">
                                            <label for="username" class="col-md-3 control-label">User Name</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your name" name="username" id="username" required="">
												@if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
										<div class="form-group">
                                            <label for="password" class="col-md-3 control-label">Password</label>
                                            <div class="col-md-9">
                                                <input type="password" class="form-control" placeholder="Your name" name="password" id="password" required="">
												@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
												</div>
                                        </div>
										
										<!-- <div class="form-group">
                                            <label for="organization" class="col-md-3 control-label">Company Name </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your name" name="organization" id="organization" required="">
												@if($errors->has('organization'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('organization') }}</strong>
                                    </span>
                                @endif</div>
                                        </div> -->
										<!-- <div class="form-group">
                                            <label for="designation" class="col-md-3 control-label">Designation </label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your name" name="designation" id="designation" required="">
												@if($errors->has('designation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('designation') }}</strong>
                                    </span>
                                @endif</div>
                                        </div> -->
                                        <!-- Email input-->
                                        <div class="form-group">
                                            <label for="email" class="col-md-3 control-label"> E-mail</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your email" name="email" id="email" required="">@if($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif</div>
                                        </div>
                                        <!-- Message body -->
                                       <!--  <div class="form-group">
                                            <label for="mobile" class="col-md-3 control-label">Mobile</label>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" placeholder="Your email" name="mobile" id="mobile" required="">@if($errors->has('mobile'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                @endif</div>
                                        </div> -->
                                        
                                        <!-- Form actions -->
                                        <div class="form-group">
                                            <div class="col-md-12 text-right">
                                                <button class="btn btn-responsive btn-primary btn-sm" type="submit">Add Jury</button>
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
