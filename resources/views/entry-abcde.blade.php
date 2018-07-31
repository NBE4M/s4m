@extends('layouts.app')
@section('content')
 <div class="container">
          <div class="row">
              <div class="col-lg-8 offset-2">
        <div class="entry-form">   
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title"> ENTRY FORM (Category A, B, C, D, E)</div>
            </div>
            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group mandatory pull-left">
                                      <small>Fields marked with <span class="mandat">*</span> are mandatory</small>
                    </div>
                  </div>
                            </div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" id="subscribeForm" name="myForm"  method="POST" action="{{ url('/entry') }}">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <select required class="form-control" name="forma" onchange="this.options[this.selectedIndex].value && (window.open(this.options[this.selectedIndex].value, '_self'));">
                                            <option value="">Select</option>
                                            <option value="entry-abcde" selected="">Category A, B, C, D, E</option>
                                            <option value="category-form">Category E.10 IDMA Person of the Year</option>
                                        </select>
                            
                    </div>
                  </div>
                </div>

                

                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Entry / Campaign Name<span class="mandat">*</span><br>
                                          <small>(Same will appear on the trophy)</small>
                                        </label>
                      <input type="text" name="Campaign" required id="" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Entrant Company<span class="mandat">*</span><br>
                                          <small>(Same will appear on the trophy)</small>
                                        </label>
                      <input type="text" name="Entrantcompany" required id="" class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Company Activity<span class="mandat">*</span><br>
                                          <small>(Please choose the field carefully as it will determine your chances to win Hall of Fame Awards)</small>
                                            
                    </label>
                      <select class="selectcountry" required name="comactivity">
                                          <option value="">Select</option>
                                          <option value="Agency">Agency</option>
                                          <option value="Advertiser">Advertiser</option>
                                          <option value="Others">Others</option>
                                        </select>
                                        
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Main Creative URL<span class="mandat">*</span><br>
                                          <small>(Only 1 url should be given - The file size should not exceed 2 MB (for PowerPoint and maximum of 5 slides) or 90 seconds (for Videos) maximum. </small><br>
                                        <small><span class="pnote">Please Note</span>: Keep the settings to 'public/any one with the link'. Prefix http:// or https:// to the URL.)</small>
                                        </label>
                      <input type="text" name="main_creative_url" required id="" class="form-control input-sm">
                                        
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Reference material URL <span class="mandat">*</span><br>
                                          <small>(Scan copy of a client declaration on the company letter head certifying the work being submitted must be duly signed by the marketing head or the signing authority and shared herewith, and any supporting material should be uploaded through Google drive. </small><br>
                                            <small><span class="pnote">Please Note</span>: Keep the settings to 'public/anyone with the link'. Prefix http:// or https:// to the URL.)</small>
                                        </label>
                      <input type="text" name="Reference_mete_url" required id="Reference_mete_url" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <small><span class="pnote">NOTE</span>: Refer to e4m Indian Digital media Awards 2018 <a href="https://e4mevents.com/idma-2018/rules" target="_blank">Rules & Regulations</a> before filling this form</small><br>
                                      <label>Please select your categories below by checking the box:  <span class="mandat">*</span></label>
                                      
                          @if ($errors->has('subcatid'))

                       <div class="alert alert-danger" style="width: 400px">
                        <strong> {{ implode('', $errors->all(':message')) }}</strong>
                       </div>
                        @endif 
                                      @php $pos='A' @endphp
                                       @foreach($categories as $cate)
                                        <h6>@php echo $pos @endphp. {{ $cate->categoryname }}</h6>
                                        @php $c='1' @endphp
                                         @foreach($cate->Subcategory  as $v)
                                        <div class="checkbox checkbox-success">
                                            <input id="checkbox1" class="styled" {{ (old('subcatid')== $v->subcategoryid)?'checked':"" }}   type="checkbox" value="{{ $v->subcategoryid }}"  name="subcatid[]" id="subcat" type="checkbox">
                                            <label for="checkbox1">@php echo $pos @endphp.@php echo $c @endphp {{$v->subcategoryname }}</label>
                                        </div>
                                         @php $c++ @endphp
                                        @endforeach
                                        @php $pos++ @endphp
                                         @endforeach
                                        
                                        
                                        
                                        
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                          <div class="checkbox checkbox-success">
                                            <input id="checkbox37" required class="styled" type="checkbox">
                                            <label for="checkbox37"><strong>This is to certify that the above entry was deployed on the internet/ mobile/social media between 0000 hours February 1st, 2017 and 23.59 hours January 31st, 2018 (both days inclusive). I/ We have read the Rules & Regulations for e4m Indian Digital Media Awards (IDMA) 2018 and agree to abide by them. </strong><span class="mandat">*</span>
                                            </label>
                                        </div>
                                        </div>
                </div>
                            </div>
                            
                            
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Covering Note / Overall Experience <span class="mandat">*</span><small>(300 words)</small></label>
                      <textarea type="text" rows="3" name="Covering_note" maxlength="2000" required id="Covering_note" class="form-control input-sm"></textarea>
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Concept (25%) <span class="mandat">*</span><small>(250 words)</small></label>
                      <textarea type="text" rows="3" name="Concept" required maxlength="2000" id="Concept" class="form-control input-sm"></textarea>
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Innovation (25%) <span class="mandat">*</span><small>(250 words)</small></label>
                      <textarea type="text" rows="3" name="Innovation" maxlength="2000" required id="Innovation" class="form-control input-sm"></textarea>
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Execution (25%) <span class="mandat">*</span><small>(250 words)</small></label>
                      <textarea type="text" rows="3" name="Execution" maxlength="2000" required id="Execution" class="form-control input-sm"></textarea>
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Results (25%) <span class="mandat">*</span><small>(250 words)</small></label>
                      <textarea type="text" rows="3" name="Results" maxlength="2000" required id="Results" class="form-control input-sm"></textarea>
                    </div>
                  </div>
                </div>
                            
                            <div class="panel-title2">ENTRY DETAILS</div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Brand Name<span class="mandat">*</span></label>
                      <input type="text" name="Brand_name" id="Brand_name" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Parent Company <span class="mandat">*</span></label>
                      <input type="text" name="parent_brand" id="parent_brand" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Twitter Handle<span class="mandat">*</span></label>
                      <input type="text" name="tw" id="tw" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Website Address <span class="mandat">*</span>
                                        <small>(Campaign Website/ Company website) </small>
                                        </label>
                      <input type="text" name="web_address" id="web_address" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Date of Start of Activity <span class="mandat">*</span></label>
                      <input type="date" name="dos" id="dos" placeholder="dd-mm-yyyy" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="panel-title2">CONTACT DETAILS OF THE AGENCY</div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Name <span class="mandat">*</span></label>
                      <input type="text" name="agency_name" required id="agency_name" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Designation  <span class="mandat">*</span></label>
                      <input type="text" name="agency_des" required id="agency_des" class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Organization  <span class="mandat">*</span></label>
                      <input type="text" name="agency_org" required id="agency_org" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Twitter Handle  <span class="mandat">*</span></label>
                      <input type="text" name="atw" id="atw" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>E-mail   <span class="mandat">*</span></label>
                      <input type="email" name="email" required id="email" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Mobile Number   <span class="mandat">*</span></label>
                      <input type="number" name="mobile" required id="mobile" class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="checkbox checkbox-success">
                                <input id="bothsame" class="styled" type="checkbox" onclick="CheckBoth();">
                                <label for="checkbox38">Please check if both are same</label>
                            </div>
                            
                            <div class="panel-title2">CONTACT DETAILS OF THE SIGNING AUTHORITY (ENTRANT COMPANY)</div>
                            
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Name <span class="mandat">*</span></label>
                      <input type="text" name="a_name" required id="a_name" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Designation  <span class="mandat">*</span></label>
                      <input type="text" name="a_des" id="a_des" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Organization  <span class="mandat">*</span></label>
                      <input type="text" name="a_org" id="a_org" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Twitter Handle  <span class="mandat">*</span></label>
                      <input type="text" name="aatw" id="aatw" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>E-mail   <span class="mandat">*</span></label>
                      <input type="email" name="aemail" id="aemail" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Mobile Number   <span class="mandat">*</span></label>
                      <input type="number" name="amobile" id="amobile" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            
                            
                            <div class="panel-title2">CONTACT DETAILS OF THE BRAND</div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Contact Person    <span class="mandat">*</span></label>
                      <input type="text" name="cperson" id="cperson" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Designation    <span class="mandat">*</span></label>
                      <input type="text" name="cdes" id="cdes" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Organization     <span class="mandat">*</span></label>
                      <input type="text" name="corg" id="corg" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Email     <span class="mandat">*</span></label>
                      <input type="email" name="cemail" id="cemail" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                             <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Mobile Number<span class="mandat">*</span></label>
                      <input type="number" name="cmobile" id="cmobile" required class="form-control input-sm">
                    </div>
                  </div>
                  
                </div>
                            
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group mandatory">
                                      <input type="submit" value="SUBMIT" class="btn btn-info btn-block btn">
                    </div>
                  </div>
                                
                                
                            </div>
                
              
              </form>
            </div>
          </div>
               </div>     
      </div>
            
        </div>  
      
            
            
              
            
            
        </div>
      </section><!-- #intro -->  
<!-- <script type="text/javascript">
    $(document).ready(
function () {
$('textarea').bind('change', function () {
// $('textarea[id$=txtfpconfirmcomments]').change(function (event) {
if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
}
});
});
</script> -->
      
<script type="text/javascript">
    $( function() {
    $( "#dos" ).datepicker({
            dateFormat: "mm/dd/yy",
            showOtherMonths: true,
            selectOtherMonths: true,
            autoclose: true,
            changeMonth: true,
            changeYear: true,
            gotoCurrent: true,
            orientation: "auto",
        });
    $('#dos').datepicker("setDate", new Date(2017,10,15) );
  } );
    
</script>


@endsection
