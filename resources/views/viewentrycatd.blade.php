@extends('layouts.app')

@section('content')
<div class="container">
          <div class="row">
              <div class="col-lg-12">
        <div class="entry-form">   
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">View Entry</div>
            </div>
            <div class="panel-body">
                      <div class="table-responsive" id="ptn">
                                <table id="example"  class="table table-striped table-bordered" cellspacing="0" width="100%">
            <tr>
              <th style="width: 300px;">Campaign</th>
              <td>{{ $entry->campaign_name }}</td>      
            </tr>
             <tr>
              <th>Brand Name</th>
              <td>{{ $entry->entry_brand_name }}</td>      
            </tr>
              <tr>
              <th>Parent Company for the Brand</th>
              <td>{{ $entry->entry_company_brand_name }}</td>      
            </tr>
            <!-- <tr>
              <th>Company Activity</th>
              <td>{{ $entry->company_activity }}</td>      
            </tr>
            <tr>
              <th>Parent Company for the Brand</th>
              <td>{{ $entry->entry_company_brand_name }}</td>      
            </tr> -->
              <tr>
              <th>Main creative URL</th>
              <td><a href="{{ $entry->main_Creative_Url }}">{{ $entry->main_Creative_Url }}</a></td>      
            </tr>
              <tr>
              <th>Reference material URL</th>
              <td><a href="{{ $entry->main_Creative_metaUrl }}"> {{ $entry->main_Creative_metaUrl }}</a></td>      
            </tr>
             <!-- <tr>
              <th>Categories </th>
              <td><ul> @foreach($categories as $v)
              <li>{{ $v['categoryname']  }}
              <ul>
              @foreach($v['detail'] as $v1)
              <li>{{ $v1['subcategoryname']  }}</li>
              @endforeach
              </ul></li>
              @endforeach
              </ul>
              </td>      
            </tr> -->
              <tr>
              <th>Covering Note / Overall Experience</th>
              <td>{{ $entry->covering_note }}</td>      
            </tr>
              <tr>
              <th>Concept</th>
              <td>{{ $entry->concept }}</td>      
            </tr>
              <tr>
              <th>Innovation</th>
              <td>{{ $entry->innovation }}</td>      
            </tr>
              <tr>
              <th>Execution</th>
              <td>{{ $entry->execution }}</td>      
            </tr>
              <tr>
              <th>Results</th>
              <td>{{ $entry->results }}</td>      
            </tr>
             
            
         <!--   <tr>
              <th>Twitter Handle</th>
              <td>{{ $entry->twitter_handle }}</td>      
            </tr>
            <tr>
              <th>Website Address</th>
              <td>{{ $entry->entrant_web_address }}</td>      
            </tr> -->
            <tr>
              <th>Date of Start of Activity</th>
              <td>{{ $entry->date_of_Start_of_Activity }}</td>      
            </tr>
             <!--<tr>
              <th>Contact Agency Name</th>
              <td>{{ $entry->agency_name }}</td>      
            </tr>
            <tr>
              <th>Contact Agency Designation</th>
              <td>{{ $entry->agency_designation }}</td>      
            </tr>
            <tr>
              <th>Contact Agency Organization</th>
              <td>{{ $entry->agency_organization }}</td>      
            </tr>
            <tr>
              <th>Contact Agency twitter Handle</th>
              <td>{{ $entry->agency_twiter }}</td>      
            </tr>
            
            <tr>
              <th>Contact Agency E-mail</th>
              <td>{{ $entry->agency_email }}</td>      
            </tr>
            <tr>
              <th>Contact Agency Mobile Number</th>
              <td>{{ $entry->agency_mobile }}</td>      
            </tr>
<tr>
              <th>AUTHORITY Name</th>
              <td>{{ $entry->authority_name }}</td>      
            </tr>
            <tr>
              <th>AUTHORITY Designation</th>
              <td>{{ $entry->authority_designation }}</td>      
            </tr>
            <tr>
              <th>AUTHORITY Organization</th>
              <td>{{ $entry->authority_organization }}</td>      
            </tr>
            <tr>
              <th>AUTHORITY twitter Handle</th>
              <td>{{ $entry->authority_twiter }}</td>      
            </tr>
            
            <tr>
              <th>AUTHORITY E-mail</th>
              <td>{{ $entry->authority_email }}</td>      
            </tr>
            <tr>
              <th>AUTHORITY Mobile Number</th>
              <td>{{ $entry->authority_mobile }}</td>      
            </tr>
             <th>Contact Person</th>
              <td>{{ $entry->brand_contact }}</td>      
            </tr>
            <tr>
              <th>Contact Designation</th>
              <td>{{ $entry->brand_desig }}</td>      
            </tr>
            <tr>
              <th>Contact Organization</th>
              <td>{{ $entry->brand_orag }}</td>      
            </tr>
            <tr>
              <th>Contact twitter Handle</th>
              <td>{{ $entry->brand_orag }}</td>      
            </tr>
            
            <tr>
              <th>Contact E-mail</th>
              <td>{{ $entry->brand_email }}</td>      
            </tr>
             <tr>
              <th>Contact Mobile</th>
              <td>{{ $entry->brand_mobile }}</td>      
            </tr>
            <tr>
              <th>Status</th>
              <td>{{ $entry->status }}</td>      
            </tr> -->
           
          </table>
 
  </div> 
				 
						 
                       <!--  <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                                    Back to dashboard
                                 </a>
								 <button id="print" class="btn btn-primary" onclick="myFunction()">
                                    Print
                  </button>                 
                            </div>
                        </div> -->
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</section>
 <script>
function myFunction() {
    window.print();
}
</script>
@endsection
