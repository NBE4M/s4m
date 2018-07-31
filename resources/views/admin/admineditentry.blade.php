@extends('layouts.admin')
@section('content')
<style type="text/css">
 .form-control {
    display: block;
    width: 70%;
    padding: .375rem .75rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
</style>
 <aside class="right-side">
 <section class="content">
    <div class="row">
        <div class="col-md-12">
              <div class="portlet box primary">
                <div class="portlet-title">
                                <div class="caption"> Admin Edit Entry  </div>
                            </div>
                 <div class="portlet-body">
                    
                  <form class="form-horizontal" role="form" method="POST" action="{{ url('admin/editentry').'/'.$entry->id }}">
        {{ csrf_field() }}
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Entry / Campaign Name<span class="mandat">*</span><br>
                                          <small>(Same will appear on the trophy)</small>
                                        </label>
                      <input type="text" name="Campaign" required value="{{ $entry->campaign_name }}" id="" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Name of the Entrant Company<span class="mandat">*</span><br>
                                          <small>(Same will appear on the trophy)</small>
                                        </label>
                      <input type="text" name="Entrantcompany" required id="" value="{{ $entry->entrant_name_of_organization }}" class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Company Activity<span class="mandat">*</span><br>
                                          <small>(Please choose the field carefully as it will determine your chances to win Mobile Marketer/ Agency of the Year)</small><br>
                                            <small><span class="pnote">NOTE</span>: Refer to e4m Indian Digital media Awards 2017 Rules & Regulations before filling this form</small>
                    </label>
                      <select class="form-control" required name="comactivity">
                                          <option value="{{ $entry->main_Creative_Url }}">{{ $entry->company_activity }}</option>
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
                      <input type="text" value="{{ $entry->main_Creative_Url }}" name="main_creative_url" required id="" class="form-control input-sm">
                                        
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
                      <input type="text" name="Reference_mete_url" value="{{$entry->main_Creative_metaUrl}}" required id="Reference_mete_url" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                  
                  </div>
                </div>
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Covering Note / Overall Experience <span class="mandat">*</span><small>(300 words)</small></label>
                      <textarea type="text" rows="3" name="Covering_note" maxlength="2000" required id="Covering_note" class="form-control input-sm">{{$entry->covering_note}}</textarea>
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Concept (25%) <span class="mandat">*</span><small>(250 words)</small></label>
                      <textarea type="text" rows="3" name="Concept" required maxlength="2000" id="Concept" class="form-control input-sm">{{ $entry->concept }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Innovation (25%) <span class="mandat">*</span><small>(200 words)</small></label>
                      <textarea type="text" rows="3" name="Innovation" maxlength="2000" required id="Innovation" class="form-control input-sm">{{ $entry->innovation }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Execution (25%) <span class="mandat">*</span><small>(250 words)</small></label>
                      <textarea type="text" rows="3" name="Execution" maxlength="2000" required id="Execution" class="form-control input-sm">{{ $entry->execution }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Results (25%) <span class="mandat">*</span><small>(250 words)</small></label>
                      <textarea type="text" rows="3" name="Results" maxlength="2000" required id="Results" class="form-control input-sm">{{ $entry->results }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            <div class="panel-title2">ENTRY DETAILS</div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Brand Name<span class="mandat">*</span></label>
                      <input type="text" name="Brand_name" value="{{ $entry->entry_brand_name }}" id="Brand_name" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Parent Company for the Brand <span class="mandat">*</span></label>
                      <input type="text" name="parent_brand" value="{{ $entry->entry_company_brand_name }}" id="parent_brand" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Twitter Handle<span class="mandat">*</span></label>
                      <input type="text" name="tw" id="tw" value="{{ $entry->twitter_handle }}"  class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Website Address <span class="mandat">*</span>
                                        <small>(Campaign Website/ Company website) </small>
                                        </label>
                      <input type="text" value="{{ $entry->entrant_web_address }}" name="web_address" id="web_address" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Date of Start of Activity *<span class="mandat">*</span></label>
                      <input type="date" name="dos" value="{{ $entry->date_of_Start_of_Activity }}" id="dos" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="panel-title2">CONTACT DETAILS OF THE AGENCY</div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Name <span class="mandat">*</span></label>
                      <input type="text" name="agency_name" value="{{ $entry->agency_name }}" required id="agency_name" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Designation  <span class="mandat">*</span></label>
                      <input type="text" value="{{ $entry->agency_designation }}" name="agency_des" required id="agency_des" class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Organization  <span class="mandat">*</span></label>
                      <input type="text" name="agency_org" value="{{ $entry->agency_organization }}" required id="agency_org" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Twitter Handle  <span class="mandat">*</span></label>
                      <input type="text" value="{{ $entry->agency_twiter }}" name="atw" id="atw" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>E-mail   <span class="mandat">*</span></label>
                      <input type="email" name="email" value="{{ $entry->agency_email }}" required id="email" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Mobile Number   <span class="mandat">*</span></label>
                      <input type="number" value="{{ $entry->agency_mobile }}" name="mobile" required id="mobile" class="form-control input-sm">
                    </div>
                  </div>
                </div> 
                            <div class="panel-title2">CONTACT DETAILS OF THE SIGNING AUTHORITY (ENTRANT COMPANY)</div>
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Name <span class="mandat">*</span></label>
                      <input type="text" name="a_name" value="{{ $entry->authority_name }}" required id="a_name" class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Designation  <span class="mandat">*</span></label>
                      <input type="text" name="a_des" id="a_des" value="{{ $entry->authority_designation }}" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Organization  <span class="mandat">*</span></label>
                      <input type="text" value="{{ $entry->authority_organization }}" name="a_org" id="a_org" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Twitter Handle  <span class="mandat">*</span></label>
                      <input type="text" value="{{ $entry->authority_twiter }}" name="aatw" id="aatw" required class="form-control input-sm">
                    </div>
                  </div>
                </div>

                       @foreach($categories as $cate)
                        <div class="col-md-12 category_hed top10 {{ $errors->has('subcatid[]') ? 'has-error' : '' }}" id="catabc">
                        <span class="aweb">  <strong>{{$cate->categoryid}}.{{ $cate->categoryname }}</strong></span>
                        @foreach($cate->Subcategory  as $v)

                        <div class="">
                        <div class="col-md-9 ">{{ $v->subcategoryname }}</div>
                        <div class="form-group m0">
                        <div class="col-md-3 pdng_none">
                        <label class="checkbox-inline"></label>
                        <input type="checkbox" class="uncheck" value="{{ $v->subcategoryid }}" {{  in_array($v->subcategoryid,$subcats)?'checked':"" }}  name="subcatid[]" id="subcat">
                        </div>
                        </div>
                        </div>
                        @endforeach  
                        </div>
                       
                        @endforeach      


                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>E-mail   <span class="mandat">*</span></label>
                      <input type="email" name="aemail" value="{{ $entry->authority_email }}" value="{{ $entry->authority_email }}" id="aemail" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Mobile Number   <span class="mandat">*</span></label>
                      <input type="number" name="amobile" value="{{ $entry->authority_mobile }}" id="amobile" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            
                            
                            <div class="panel-title2">CONTACT DETAILS OF THE BRAND</div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Contact Person    <span class="mandat">*</span></label>
                      <input type="text" name="cperson" value="{{ $entry->brand_contact }}" id="cperson" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Designation    <span class="mandat">*</span></label>
                      <input type="text" name="cdes" value="{{ $entry->brand_desig }}" id="cdes" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Organization     <span class="mandat">*</span></label>
                      <input type="text" name="corg" value="{{ $entry->brand_orag }}" id="corg" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Email     <span class="mandat">*</span></label>
                      <input type="email" name="cemail" value="{{ $entry->brand_email }}" id="cemail" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
						<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
						<label>Mobile Number<span class="mandat">*</span></label>
						<input type="number" name="cmobile" value="{{ $entry->brand_mobile }}" id="cmobile" required class="form-control input-sm">
						</div>
						</div>

						</div>

						<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
						<label>Status<span class="mandat">*</span></label>
					 <select class="form-control" id="status" name="status" >
                                          <option value="{{ $entry->status }}">{{ $entry->status }}</option>
                                          <option value="active">active</option>
                                          <option value="inactive">Inactive</option>
                                        </select>
						</div>
						</div>

						</div>
                            <div class="row">
                              <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group mandatory">
                                      <small>Fields marked with <span class="mandat">*</span> are mandatory</small>
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
</section>
   </aside>
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
   <script>
    $("#status").on('change', function () {
    var val = $(this).val();
    if (val === "inactive") {
      $('.uncheck').prop('checked', false);
        return;
    }
});
</script>
@endsection
