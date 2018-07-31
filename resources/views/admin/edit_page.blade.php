@extends('layouts.admin')

@section('content')
 
 
   

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
                                    Update Page
                                   
                                </h3>
                                
                            </div>
                            <div class="panel-body">
 @foreach($edit as $data)
  <form action="{{URL('/admin/updatestory')}}" method="post"  >
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
    <input type="hidden" name="id" value="{{$data->id}}">
    <div class="row">
      <div class="col-sm-8">
        <label for="fname">HeadLine </label>
      </div>
      <div class="col-sm-8">
        <input type="text" id="fname" class="form-control" readonly="readonly" name="title" value="{{$data->title}}" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <label for="lname">URL </label>
      </div>
      <div class="col-sm-8">
        <input type="text" id="lname" name="slug" class="form-control" value="{{$data->slug}}" required="">
      </div>
    </div>
    <div class="row" id="WYSIWYG_Editor_-_Full_Options">
      <div class="col-sm-8" >
        <label for="subject">Full Story</label>
      </div>
      <div class="col-sm-8 controls elrte-wrapper">
        <textarea id="editor1" class="auto-resize required formattedtextareat" name="full_story"  style="height:500px;width: 600px" required="">{{$data->full_story}}</textarea>

    <!--  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script> -->
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <label for="country">Meta Title</label>
      </div>
      <div class="col-sm-8">
        <input type="text" name="meta_title" class="form-control" value="{{$data->meta_title}}" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <label for="country">Meta Keyword</label>
      </div>
      <div class="col-sm-8">
        <input type="text" name="meta_keyword" class="form-control" value="{{$data->meta_keyword}}" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <label for="country">Meta Description</label>
      </div>
      <div class="col-sm-8">
        <input type="text" name="meta_description" class="form-control" value="{{$data->meta_description}}" required="">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-8">
        <label for="country">Publish Date</label>
      </div>
      <div class="col-sm-8">
        <input type="date" name="publish_date" class="form-control" value="{{$data->publish_date}}" required="">
      </div>
    </div>
   <br>
    <center>
    <div class="row">
       <div class="col-sm-8">
     <button type="submit" class="btn btn-success">Submit</button>
    </div>
  </div>
  </form>
  @endforeach
                            </div>
                        </div>
                        <!--basic form 2 starts-->
                       
                     
                         
                    </div>
                    <!--md-6 ends-->
                   
                    
                     
                </div>
                <!--main content ends--> </section>
            <!-- content --> </aside>
 
@endsection
