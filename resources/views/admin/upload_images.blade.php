@extends('layouts.admin')

@section('content')

<aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Uploads</h1>
                 
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
                                Upload Images
                                </h3>
                                </div>
                                <div class="panel-body">
                                <form files="true" class="dropzone" id="image-upload" action="{{URL('/admin/dropzoneUploadFile')}}" method="post"  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="user_id" class="form-control" value="{{Auth::user()->id}}">
                                </form>
                                </div>
                        </div>
                        <!--basic form 2 starts-->
                       

                                <div class="container">
                                @foreach($data as $k)
                                <a class="lightbox">
                                <img src="{{ url('/') }}/public/img/{{$k}}" class="img-thumbnail"  width="100" height="100"> </a> 
                                @endforeach
                                </div>

 <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        </div>
        <div class="modal-body">
          <img src="" class="enlargeImageModalSource" style="width: 100%;">
        </div>
      </div>
    </div>
</div>
                                </div>
                         
                
                    <!--md-6 ends-->
                   
                    
                     
                </div>
                <!--main content ends--> </section>
            <!-- content --> </aside>
                <link href="{{url('public/admin/css/uploadimg.css')}}" rel="stylesheet">
                <script src="{{url('public/admin/js/uploadimage.js')}}"></script>
                <script type="text/javascript">
                Dropzone.options.imageUpload = {
                maxFilesize  : 1,
                acceptedFiles: ".jpeg,.jpg,.png,.gif,.css,.js"
                };
                </script>
                <script type="text/javascript">
                    $(function() {
        $('img').on('click', function() {
            $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
            $('#enlargeImageModal').modal('show');
        });
});
                </script>
<style type="text/css">a.lightbox img {
height: 150px;
    border: 3px solid white;
    box-shadow: 0px 0px 8px rgba(0,0,0,.3);
    margin: 3px 20px 20px 20px;
}</style>
@endsection
