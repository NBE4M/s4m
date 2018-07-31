@extends('layouts.admin')

@section('content')
 <aside class="right-side">
           <section class="content-header">
                <!--section starts-->
                <h1>Entry View</h1>                
            </section>
			
  <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <!-- BEGIN SAMPLE TABLE PORTLET-->
                        <div class="portlet box primary">
                            <div class="portlet-title">
                                <div class="caption">                                  
                                    Entry Details
                                </div>
                            </div>
               <div class="portlet-body">
                                <div class="table-scrollable">
                                        <table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
            <tr>
              <th>Name of the Nominee</th>
              <td>{{ $entry->Nominee_name }}</td>      
            </tr>
            <tr>
              <th>Designation</th>
              <td>{{ $entry->designation }}</td>      
            </tr>
            <tr>
              <th>Company</th>
              <td>{{ $entry->company }}</td>      
            </tr>
              <tr>
              <th>Supporting Document URL</th>
              <td>{{ $entry->supporting_doc }}</td>      
            </tr>
              <tr>
              <th>Brief Profile</th>
              <td> {{ $entry->bief_profile }}</td>      
            </tr>
            
              <tr>
              <th>Nominee singular best contribution during the year which helped re-define the digital media viz. in any relevant area of medium innovation, measurement framework, brand impact etc</th>
              <td>{{ $entry->brand_impact }}</td>      
            </tr>
              <tr>
              <th>A Pioneer</th>
              <td>{{ $entry->pioneer }}</td>      
            </tr>
              <tr>
              <th>An Aspiration for Young Digital Media Aspirants</th>
              <td>{{ $entry->Aspirants }}</td>      
            </tr>
              <tr>
              <th>Profitability of the Organisation under your Guidance</th>
              <td>{{ $entry->profitability }}</td>      
            </tr>
              <tr>
              <th>New Standards and Practices introduced</th>
              <td>{{ $entry->standards_practices }}</td>      
            </tr>
              <tr>
              <th>contribution to the Industry beyond Self</th>
              <td>{{ $entry->contribution }}</td>      
            </tr>
              <tr>
              <th>Shining Moments</th>
              <td>{{ $entry->Shining_Moments }}</td>      
            </tr>
         
            <tr>
              <th>Contact Name </th>
              <td>{{ $entry->contact_name }}</td>      
            </tr>
            <tr>
              <th>Contact Designation</th>
              <td>{{ $entry->contact_designation }}</td>      
            </tr>
            <tr>
              <th>Contact Organization</th>
              <td>{{ $entry->contact_organization }}</td>      
            </tr>
            <tr>
              <th>Contact Twitter Handle</th>
              <td>{{ $entry->contact_twiter }}</td>      
            </tr>
            <tr>
              <th>Contact E-mail</th>
              <td>{{ $entry->contact_email }}</td>      
            </tr>
            <tr>
              <th>Contact Mobile Number</th>
              <td>{{ $entry->contact_mobile }}</td>      
            </tr>
            <tr>
              <th>Name </th>
              <td>{{ $entry->sign_name }}</td>      
            </tr>
            <tr>
              <th>Designation</th>
              <td>{{ $entry->sign_designation }}</td>      
            </tr>
            <tr>
              <th>Organization</th>
              <td>{{ $entry->sign_organization }}</td>      
            </tr>
            <tr>
              <th>Twitter Handle</th>
              <td>{{ $entry->sign_twiter }}</td>      
            </tr>
            <tr>
              <th>E-mail</th>
              <td>{{ $entry->sign_email }}</td>      
            </tr>
            <tr>
              <th>Mobile Number</th>
              <td>{{ $entry->sign_mobile }}</td>      
            </tr>
             <tr>
              <th>Subcategory Name</th>
              <td>{{ $entry->subcategoryname }}</td>      
            </tr>
  </div> 
  </div> 
	<div class="row ">
 
	 
	  
								<div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/admin/entrylist') }}" class="btn btn-primary">
                                    Back to Entry List
                                 </a> <!-- <a href="{{ url('/admin/editentry').'/'.$entry->id }}" class="btn btn-primary">
                                   Update Entry
                                 </a> -->
								  
                                     
                                 </a>
                            </div>
                        </div>
								 
	</div>           
                    
                </div>
            </div>
     
</section>
   </aside>
@endsection
