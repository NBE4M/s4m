@extends('layouts.admin')
@section('content')
    <!-- Include Editor style. -->
 

<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Add New Page</h1>
                 
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
                                    Add New Page
                                   
                                </h3>
                                
                            </div>
                            <div class="panel-body">
                                <form action="{{URL('/admin/createpage')}}" method="post"  >
    {{csrf_field()}}
    <input type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}">
    <div class="row">
      <div class="col-sm-8">
        <label for="fname">HeadLine </label>
      </div>
      <div class="col-sm-8">
        <input type="text" id="fname" class="form-control" name="title" placeholder="HeadLine" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <label for="lname">URL </label>
      </div>
      <div class="col-sm-8">
        <input type="text" id="lname" class="form-control" name="slug" placeholder="URL" required="">
      </div>
    </div>
    <div class="row" id="WYSIWYG_Editor_-_Full_Options">
      <div class="col-sm-8">
        <label for="subject">Full Story</label>
      </div>
      <div class="col-sm-8 controls elrte-wrapper">
        <textarea id="editor1" name="full_story" placeholder="Full Story.." style="height:200px" required=""></textarea>

         <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
       
      </div>
    </div>
    <div class="row">
     <div class="col-sm-8">
        <label for="country">Meta Title</label>
      </div>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="meta_title" required="">
      </div>
    </div>
    <div class="row">
     <div class="col-sm-8">
        <label for="country">Meta Keyword</label>
      </div>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="meta_keyword" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <label for="country">Meta Description</label>
      </div>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="meta_description" required="">
      </div>
    </div>
    <div class="row">
       <div class="col-sm-8">
        <label for="country">Publish Date</label>
      </div>
      <div class="col-sm-8">
        <input type="date" class="form-control" name="publish_date" required="">
      </div>
    </div><br>
    <center>
    <div class="row">
       <div class="col-sm-8">
     <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
    </center>
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
