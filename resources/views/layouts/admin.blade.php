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
    <header class="header">
        <a href="{{ url('/admin') }}" class="logo">
            <img src="{{ url('public/img/IDMA_logo.png') }}" alt="logo" style="    width: 60px;">
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <div>
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <div class="responsive_nav"></div>
                </a>
            </div>
            <div class="navbar-right">
                <ul class="nav navbar-nav">
                 
                </ul>
            </div>
        </nav>
    </header>
    <div class="wrapper row-offcanvas row-offcanvas-left">
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="left-side sidebar-offcanvas">
            <section class="sidebar ">
                <div class="page-sidebar  sidebar-nav">
                    <div class="nav_icons">
                        <ul class="sidebar_threeicons">
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="hammer" title="Form Builder 1" data-loop="true" data-color="#42aaca" data-hc="#42aaca" data-s="25"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="list-ul" title="Form Builder 2" data-loop="true" data-color="#e9573f" data-hc="#e9573f" data-s="25"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="vector-square" title="Button Builder" data-loop="true" data-color="#f6bb42" data-hc="#f6bb42" data-s="25"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="livicon" data-name="new-window" title="Form Builder 1" data-loop="true" data-color="#37bc9b" data-hc="#37bc9b" data-s="25"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                    @if(Auth::user()->email  == 'e4mdesign@gmail.com')
                    <ul id="menu" class="page-sidebar-menu">
                        <li>
                            <a href="{{ url('/admin')}}">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>

                        </li>
                         <li>
                            <a href="#">
                                <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                                <span class="title">Pages</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/admin/addpage') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Add New Pages
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{ url('/admin/managepage') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Existing Pages
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{ url('/admin/upload_file') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Upload Images
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{ url('/admin/upload_gallery') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Upload Gallery Images
                                    </a>
                                </li>

                                 <li>
                                    <a href="{{ url('/admin/categorylist') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Category
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{ url('/admin/subcategorylist') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Subcategory
                                    </a>
                                </li>
                                </ul>

                        </li>
 <li>
                            <a href="{{ url('/admin')}}">
                                <i class="livicon" data-name="sign-out" data-s="18"></i>
                                <span class="title"> {{ Auth::user()->fname }} {{ Auth::user()->lname }}</span>
                            </a>

                        </li>
                        <li>
                        <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                    
                    </li>
   
                    </ul>
                    @elseif(Auth::user()->email  == 'gluthra@exchange4media.com')
                    <ul id="menu" class="page-sidebar-menu">
                        <li>
                            <a href="{{ url('/admin')}}">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>

                        </li>
                        <li>
                            <a href="#">
                            
                                 
                                <i class="livicon" data-name="flag" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Reports</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                
                                 <li>
                                    <a href="{{ url('/admin/admindelpaymentreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Delegate Payment Report
                                    </a>                                
                                </li>
                                <li>
                                    <a href="{{ url('/admin/adminpaymentreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Online Payment Report
                                    </a>                                
                                </li>

                                <li>
                                    <a href="{{ url('/admin/adminneftpaymentreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        NEFT Payment Report
                                    </a>                                
                                </li>
                                <li>
                                    <a href="{{ url('/admin/adminchequepaymentreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Cheque Payment Report
                                    </a>                                
                                </li> 
                                </ul>
                            </li>
                         <li>
                            <a href="{{ url('/admin')}}">
                                <i class="livicon" data-name="sign-out" data-s="18"></i>
                                <span class="title"> {{ Auth::user()->fname }} {{ Auth::user()->lname }}</span>
                            </a>

                        </li>
                        <li>
                        <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                    
                    </li>
   
                    </ul>
                    @else
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul id="menu" class="page-sidebar-menu">
                        <li>
                            <a href="{{ url('/admin')}}">
                                <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
                                <span class="title">Dashboard</span>
                            </a>

                        </li>
                        <li>
                            <a href="#">
                                <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                                <span class="title">Pages</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/admin/addpage') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Add New Pages
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{ url('/admin/managepage') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Existing Pages
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{ url('/admin/upload_file') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Upload Images
                                    </a>
                                </li>

                                <li>
                                    <a href="{{ url('/admin/upload_gallery') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Upload Gallery Images
                                    </a>
                                </li>


                                 <li>
                                    <a href="{{ url('/admin/categorylist') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Category
                                    </a>
                                </li>
                                 <li>
                                    <a href="{{ url('/admin/subcategorylist') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Subcategory
                                    </a>
                                </li>
                                </ul>

                        </li>
                        
                          <li>
                            <a href="#">
                                <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
                                <span class="title">Jury</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                            <li>
                                    <a href="{{ url('/admin/addjury') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Add Jury
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/jurylist') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Jury List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/avaibleentry') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Assign Entry for Judging
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/juryassign') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Assign for Score
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/top5enrty') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Top 5 Entry Report
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/juryreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Jury Report
                                    </a>
                                </li><li>
                                    <a href="{{ url('/admin/juryissuereport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Jury Recuse/Issue Report
                                    </a>
                                </li> 
                                </ul>
                            </li>
                         <li>
                         <li>
                            <a href="#">
                            
                                 
                                <i class="livicon" data-name="users" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Users</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <!-- <li>
                                    <a href="{{ url('/admin/adduser') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Add Users
                                    </a>
                                </li> -->
                                <li>
                                    <a href="{{ url('/admin/userslist') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Users List
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/catentrylist') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Category Entry List
                                    </a>
                                </li>
                                 
                                <li>
                                    <a href="{{ url('/admin/entrylist') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Users Entry List
                                    </a>                                
                                </li>
                                </ul>
                            </li>
                            <li>
                            <a href="#">
                            
                                 
                                <i class="livicon" data-name="flag" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
                                <span class="title">Reports</span>
                                <span class="fa arrow"></span>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/admin/adminuserentryreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                      User wise Entry Report
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/admincompentryreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                       Company wise Entry Report 
                                    </a>
                                </li>
                                 
                                <li>
                                    <a href="{{ url('/admin/admincategentryreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Category wise Entry Report 
                                    </a>                                
                                </li>
                                 <li>
                                    <a href="{{ url('/admin/admindelpaymentreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Delegate Payment Report
                                    </a>                                
                                </li>
                                <li>
                                    <a href="{{ url('/admin/adminpaymentreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Online Payment Report
                                    </a>                                
                                </li>

                                <li>
                                    <a href="{{ url('/admin/adminneftpaymentreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        NEFT Payment Report
                                    </a>                                
                                </li>
                                <li>
                                    <a href="{{ url('/admin/adminchequepaymentreport') }}">
                                        <i class="fa fa-angle-double-right"></i>
                                        Cheque Payment Report
                                    </a>                                
                                </li> 
                                </ul>
                            </li>
 <li>
                            <a href="{{ url('/admin')}}">
                                <i class="livicon" data-name="sign-out" data-s="18"></i>
                                <span class="title"> {{ Auth::user()->fname }} {{ Auth::user()->lname }}</span>
                            </a>

                        </li>
                        <li>
                        <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        <i class="livicon" data-name="sign-out" data-s="18"></i>
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                    
                    </li>
   
                    </ul>
                    @endif
                    <!-- END SIDEBAR MENU -->
                </div>
            </section>
        </aside> 
        
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