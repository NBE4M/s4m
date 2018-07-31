@extends('layouts.admin')
@section('content')
 <aside class="right-side">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <!--section starts-->
                <h1>Admin Delegate Payment Report</h1>
                
            </section>
            <!--section ends-->
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">                                  
                                     Total Payment Entry {{   count($payment)     }} <br>
                                     Total Neft Payment Entry {{   count($delneft)     }} <br>
                                     Total Check Payment Entry {{   count($delcheck)     }}<br>
                                     Total Visitor Pass Entry {{   count($delnopay)     }}
                                    <button style="float: right;" class="btn btn-success btnExport">Export to excel</button>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <div class="table-scrollable dvData" style="overflow: scroll;">
                                   <h2 style="text-align: -webkit-center;">Online payment</h2>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>                              
                                                <th>User Email</th>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Address</th>  
                                                <th> Orderid </th>
                                                <th> GST No </th>
                                                <th> Delegate Pass Category </th>
                                                <th> Delegate Type </th>
                                                <th> Total Amount </th>
                                                 <th> payment date </th>
                                            </tr>
                                        </thead>
                                        <tbody>
								 	@php
									$i = 0
									@endphp
									
								@foreach ($payment as $v)
								@php
						$i++;
						@endphp
                                            <tr>
                                                 <td> {{ $i }} </td>
                                                                   
                                                <td> {{ $v->Email }} </td>
                                                <td> {{ $v->Name }} </td>
                                                <td> {{ $v->Organisation }} </td>
                                                  <td> {{ $v->Address }} </td>
                                                <td> {{ $v->OrderNo }} </td>
                                                <td> {{ $v->gst }} </td>
                                                 <td> {{ $v->delegate_Pass_category }} </td>
                                                  <td> {{ $v->Delegate_Type }} </td>
                                                <td> {{ $v->Amount }} </td>
                                                 <td> {{ $v->pdate }} </td>
                                               
                                            </tr>
                                           @endforeach  

                                        </tbody>
                                    </table>
                                     <hr style="    border-top: 6px solid #515763;">

<h2 style="text-align: -webkit-center;">Neft payment</h2>
                                     <table class="table table-hover">
                                        <thead>
                                            <tr>
                                               <th>S. No</th>                               
                                                <th>User Email</th>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Address</th>  
                                                <th> Orderid </th>
                                                <th> GST No </th>
                                                 <th> Delegate Pass Category </th>
                                                <th> Delegate Type </th>
                                                <th> Total Amount </th>
                                                <th> Payment date </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @php
                                    $i = 0
                                    @endphp
                                    
                                @foreach ($delneft as $v1)
                                @php
                        $i++;
                        @endphp
                                            <tr>
                                               <td> {{ $i }} </td>
                                                                   
                                                <td> {{ $v1->Email }} </td>
                                                <td> {{ $v1->Name }} </td>
                                                <td> {{ $v1->Organisation }} </td>
                                                  <td> {{ $v1->Address }} </td>
                                               
                                        
                                                <td> {{ $v1->OrderNo }} </td>
                                                <td> {{ $v1->gst }} </td>
                                                <td> {{ $v1->delegate_Pass_category }} </td>
                                                  <td> {{ $v1->Delegate_Type }} </td>
                                                <td> {{ $v1->Amount }} </td>
                                                 <td> {{ $v1->pdate }} </td>
                                               
                                            </tr>
                                           @endforeach  

                                        </tbody>
                                    </table>

                                     <hr style="    border-top: 6px solid #515763;">

<h2 style="text-align: -webkit-center;">No payment Client</h2>
                                     <table class="table table-hover">
                                        <thead>
                                            <tr>
                                               <th>S. No</th>                               
                                                <th>User Email</th>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Address</th>  
                                                <th> Orderid </th>
                                                <th> GST No </th>
                                                 <th> Delegate Pass Category </th>
                                                <th> Delegate Type </th>
                                                <th> Total Amount </th>
                                                <th> Payment date </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @php
                                    $i = 0
                                    @endphp
                                    
                                @foreach ($delnopay as $v3)
                                @php
                        $i++;
                        @endphp
                                            <tr>
                                               <td> {{ $i }} </td>
                                                                   
                                                <td> {{ $v3->Email }} </td>
                                                <td> {{ $v3->Name }} </td>
                                                <td> {{ $v3->Organisation }} </td>
                                                  <td> {{ $v3->Address }} </td>
                                               
                                        
                                                <td> {{ $v3->OrderNo }} </td>
                                                <td> {{ $v3->gst }} </td>
                                                <td> {{ $v3->delegate_Pass_category }} </td>
                                                  <td> {{ $v3->Delegate_Type }} </td>
                                                <td> {{ $v3->Amount }} </td>
                                                 <td> {{ $v3->pdate }} </td>
                                               
                                            </tr>
                                           @endforeach  

                                        </tbody>
                                    </table>


                                    <hr style="    border-top: 6px solid #515763;">
<h2 style="text-align: -webkit-center;">Check payment</h2>


                                     <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>S. No</th>                               
                                                <th>User Email</th>
                                                <th>Name</th>
                                                <th>Company</th>
                                                <th>Address</th>                               
                                                <th>Cheque No</th>
                                                <th> Bank name </th>
                                                <th> Remark </th>
                                                <th> Orderid </th>
                                                <th> GST NO </th>
                                                 <th> Delegate Pass Category </th>
                                                <th> Delegate Type </th>
                                                 <th> Cheque Date </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @php
                                    $i = 0
                                    @endphp
                                    
                                @foreach ($delcheck as $v2)
                                @php
                        $i++;
                        @endphp
                                            <tr>
                                               <td> {{ $i }} </td>
                                                                
                                                <td> {{ $v2->Email }} </td>
                                                <td> {{ $v2->Name }} </td>
                                                <td> {{ $v2->Organisation }} </td>
                                                 <td> {{ $v2->Address }} </td>
                                                
                                                <td> {{ $v2->ChequeNo }} </td>
                                                <td> {{ $v2->BankName }} </td>
                                                <td> {{ $v2->Remark }} </td>
                                                <td> {{ $v2->OrderNo }} </td>
                                                <td> {{ $v2->gst }} </td>
                                                <td> {{ $v2->delegate_Pass_category }} </td>
                                                  <td> {{ $v2->Delegate_Type }} </td>
                                                <td> {{ $v2->pdate }} </td>                  
                                                
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
         <script type="text/javascript">
     $(".btnExport").click(function (e) {
      
       window.open('data:application/vnd.ms-excel,' + encodeURIComponent($('.dvData').html()));
       e.preventDefault();
   });
   </script>
@endsection
