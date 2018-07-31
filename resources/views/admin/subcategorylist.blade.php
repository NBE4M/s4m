@extends('layouts.admin')
@section('content')
<style type="text/css">@import url(http://fonts.googleapis.com/css?family=Roboto);

/****** LOGIN MODAL ******/
.loginmodal-container {
  padding: 30px;
  max-width: 350px;
  width: 100% !important;
  background-color: #F7F7F7;
  margin: 0 auto;
  border-radius: 2px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
  overflow: hidden;
  font-family: roboto;
}

.loginmodal-container h1 {
  text-align: center;
  font-size: 1.8em;
  font-family: roboto;
}

.loginmodal-container input[type=submit] {
  width: 100%;
  display: block;
  margin-bottom: 10px;
  position: relative;
}

.loginmodal-container input[type=text], input[type=password] {
  font-size: 16px;
  width: 100%;
  margin-bottom: 10px;
  -webkit-appearance: none;
  background: #fff;
  border: 1px solid #d9d9d9;
  border-top: 1px solid #c0c0c0;
  /* border-radius: 2px; */
  padding: 0 8px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
}

.loginmodal-container input[type=text]:hover, input[type=password]:hover {
  border: 1px solid #b9b9b9;
  border-top: 1px solid #a0a0a0;
  -moz-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
  box-shadow: inset 0 1px 2px rgba(0,0,0,0.1);
}

.loginmodal {
  text-align: center;
  font-size: 14px;
  font-family: 'Arial', sans-serif;
  font-weight: 700;
  height: 36px;
  padding: 0 8px;
/* border-radius: 3px; */
/* -webkit-user-select: none;
  user-select: none; */
}

.loginmodal-submit {
  /* border: 1px solid #3079ed; */
  border: 0px;
  color: #fff;
  text-shadow: 0 1px rgba(0,0,0,0.1); 
  background-color: #4d90fe;
  padding: 17px 0px;
  font-family: roboto;
  font-size: 14px;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#4787ed)); */
}

.loginmodal-submit:hover {
  /* border: 1px solid #2f5bb7; */
  border: 0px;
  text-shadow: 0 1px rgba(0,0,0,0.3);
  background-color: #357ae8;
  /* background-image: -webkit-gradient(linear, 0 0, 0 100%,   from(#4d90fe), to(#357ae8)); */
}

.loginmodal-container a {
  text-decoration: none;
  color: #666;
  font-weight: 400;
  text-align: center;
  display: inline-block;
  opacity: 0.6;
  transition: opacity ease 0.5s;
} 

.login-help{
  font-size: 12px;
}</style>
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
               <h1>Category List</h1>
                
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">                                  
                                      Category List -  Total Category - {{   count($data)     }}
                                       
                                     <button class="btn btn-success btnExport">Export to excel</button>
                                      
                                        <button class="btn btn-success" data-toggle="modal" data-target="#login-modal" style="float: right;">Add New SubCategory</button>
                                </div>
                            </div>

                            <div class="portlet-body">
                                <div class="table-scrollable dvData" style="overflow: scroll;">
                                  <table class="table table-bordered sortable">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                 <th>Category Name</th>
                                              <th>SubCategory Name</th>
                                               <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      @php
                                      $i = 0;
                                      $i++;
                                      @endphp 
                                    @foreach($data as $v)
            						
                                     
                                    <tr id="{{ $v->subcategoryid }}">
                                                <td>#</td>
                                                 <td>{{ $v->categoryname }}</td>
                                                <td><a href="" class="edit-modal" data-id="{{$v->subcategoryid}}" data-flag="{{$v->flag}}"
                                        data-fname="{{$v->subcategoryname}}">
                                                       {{ $v->subcategoryname }}
                                                    </a></td>
                                                     @if($v->flag==0)
                                                    <td>
                                                       InActive
                                                   </td>
                                                   @else
                                                   <td>
                                                       Active
                                                   </td>
                                                   @endif
                                            </tr>
                                           
                                        @endforeach  
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END SAMPLE TABLE PORTLET-->
                    </div>
                       
                </div>
            </section>
            <!-- content -->
        </aside>
             <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="loginmodal-container">
          <h1>Add Subcategory</h1><br>
          <form action="{{'addsubcat'}}" method="post">
            {{ csrf_field() }}
            <select name="categoryid" class="form-control" >
                  <option value="0">Select</option>
                  @foreach($cat as $cats)
                  <option value="{{$cats->categoryid}}">{{$cats->categoryname}}</option>
                  @endforeach
                </select><br>
          <input type="text" class="form-control" name="subcategoryname" placeholder="Subcategoryname">
          <input type="submit" name="login" class="login loginmodal-submit" value="Add">
          </form>
        </div>
      </div>
      </div>

      <div class="modal fade" id="login-modal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="loginmodal-container">
          <h1>Update Subcategory</h1><br>
          <form action="{{'updatesubcat'}}" method="post">
            {{ csrf_field() }}
            <select name="categoryidedit" class="form-control" >
                  <option value="0">Select</option>
                  @foreach($cat as $cats)
                  <option value="{{$cats->categoryid}}">{{$cats->categoryname}}</option>
                  @endforeach
                </select><br>
          <input type="text" class="form-control" name="subcategorynameedit" id="subcategorynameedit" placeholder="subcategorynameedit">
          <input type="hidden" class="form-control" name="subcat_id" id="subcat_id" placeholder="subcat_id">
           <input type="text" name="status" class="form-control" id="status">
          <input type="submit" name="login" class="login loginmodal-submit" value="Update">
          </form>
        </div>
      </div>
      </div>

         <script type="text/javascript">
     $(".btnExport").click(function (e) {
      
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('.dvData').html()));
       e.preventDefault();
   });
      $('.edit-modal').click(function (e) {
        $('#subcat_id').val($(this).data('id'));
        $('#status').val($(this).data('flag'));
        $('#subcategorynameedit').val($(this).data('fname'));
        $('#login-modal1').modal();
        return false;
    });
   </script>
@endsection
