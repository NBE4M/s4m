<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>IDMA-2018 Admin Panel</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- font Awesome -->
      
    <link href="{{ url('public/admin/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ url('public/admin/css/black.css') }}" rel="stylesheet" type="text/css" id="colorscheme" />
    <link href="{{ url('public/admin/css/panel.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ url('public/admin/css/metisMenu.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ url('public/admin/js/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
    <script src="{{ url('public/admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="https://e4mevents.com/idma-2018/public/ckeditor_sdk/vendor/ckeditor/ckeditor.js"></script>
   <link rel="stylesheet" type="text/css" href="{{url('public/css/datatable.css')}}">
<script type="text/javascript" charset="utf8" src="{{url('public/js/datatable.js')}}"></script>

<!-- <script>
$(document).ready(function(){
  $('.table').dataTable()
});
</script> -->
</head>

<body class="skin-josh">
    <div class="wrapper row-offcanvas row-offcanvas-left">
        
        @yield('content')
        </div>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left"> <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>
<!-- global js -->

<!--livicons-->
<script src="{{ url('public/admin/js/raphael-min.js') }}" type="text/javascript"></script>
<script src="{{ url('public/admin/js/livicons-1.4.min.js') }}" type="text/javascript"></script>
<script src="{{ url('public/admin/js/josh.js') }}" type="text/javascript"></script>
<script src="{{ url('public/admin/js/metisMenu.js') }}" type="text/javascript"></script>

</html>