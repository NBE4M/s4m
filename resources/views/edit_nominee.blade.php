@extends('layouts.app')
@section('content')
<div class="container">
          <div class="row">
              <div class="col-lg-8 offset-2">
        <div class="entry-form">   
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title text-uppercase">IDMA Person of the Year ENTRY FORM</div>
            </div>
            <div class="panel-body">
               <form class="form-horizontal" role="form" method="POST" action="{{ url('/entrynominee').'/'.$entry->id }}">
                {{ csrf_field() }}
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Name of the Nominee <span class="mandat">*</span><br>
                                          <small>(Same will appear on the trophy)</small>
                                        </label>
                      <input type="text" name="Nominee_name" id="Nominee_name" value="{{ $entry->Nominee_name }}" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Designation <span class="mandat">*</span><br>
                                          <small>(Same will appear on the trophy) </small>
                                        </label>
                      <input type="text" name="designation" value="{{ $entry->designation }}" id="designation" required class="form-control input-sm">
                    </div>
                  </div>
                </div>   
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Company <span class="mandat">*</span><br>
                                          <small>(Same will appear on the trophy) </small>
                                        </label>
                      <input type="text" name="company" value="{{ $entry->company }}" id="company" required class="form-control input-sm">
                                        <small><span class="pnote"> Note</span>: Refer to e4m Indian Digital media Awards 2017 Rules & Regulations before filling this form</small>
                    </div>
                  </div>
                </div>
                            
               <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Supporting Document URL <span class="mandat">*</span><br>
                                          <small>(Only 1 url should be given) </small>
                                        </label>
                      <input type="text" name="supporting_doc" value="{{ $entry->supporting_doc }}" id="supporting_doc" required class="form-control input-sm">
                                        <small><span class="pnote">Please Note</span>: Keep the settings to 'public/any one with the link'. Prefix http:// or https:// to the URL.)</small>
                    </div>
                  </div>
                </div>    
                 
                            
                      
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Brief Profile <span class="mandat">*</span><small>(250 words)</small></label>
                      <textarea type="text" rows="3" name="bief_profile" id="bief_profile" maxlength="1500" required class="form-control input-sm">{{ $entry->bief_profile }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Nominee singular best contribution during the year which helped re-define the digital media viz. in any relevant area of medium innovation, measurement framework, brand impact etc  <span class="mandat">*</span><small>(150 words)</small></label>
                      <textarea type="text" rows="3" name="brand_impact" id="brand_impact" required maxlength="1500" class="form-control input-sm">{{ $entry->brand_impact }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>A Pioneer<span class="mandat">*</span><small>(200 words)</small></label>
                      <textarea type="text" rows="3" name="pioneer" id="pioneer" required maxlength="1500" class="form-control input-sm">{{ $entry->pioneer }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>An Aspiration for Young Digital Media Aspirants  <span class="mandat">*</span><small>(200 words)</small></label>
                      <textarea type="text" rows="3" name="Aspirants" id="Aspirants" required maxlength="1500" class="form-control input-sm">{{ $entry->Aspirants }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Profitability of the Organisation under your Guidance <span class="mandat">*</span><small>(200 words)</small></label>
                      <textarea type="text" rows="3" name="profitability" id="profitability" maxlength="1500" required class="form-control input-sm">{{ $entry->profitability }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>New Standards and Practices introduced  <span class="mandat">*</span><small>(200 words)</small></label>
                      <textarea type="text" rows="3" name="standards_practices" required maxlength="1500" id="ptandards_practices" class="form-control input-sm">{{ $entry->standards_practices }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Contribution to the Industry beyond Self  <span class="mandat">*</span><small>(200 words)</small></label>
                      <textarea type="text" rows="3" name="contribution" id="contribution" required maxlength="1500" class="form-control input-sm">{{ $entry->contribution }}</textarea>
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Shining Moments   <span class="mandat">*</span><small>(200 words)</small></label>
                      <textarea type="text" rows="3" name="Shining_Moments" id="Shining_Moments" required maxlength="1500" class="form-control input-sm">{{ $entry->Shining_Moments }}</textarea>
                    </div>
                  </div>
                </div>
                            <div class="panel-title2">CONTACT DETAILS OF THE NOMINEE</div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Name <span class="mandat">*</span></label>
                      <input type="text" name="cname" id="cname" value="{{ $entry->contact_name }}" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Designation  <span class="mandat">*</span></label>
                      <input type="text" name="cdesignation" value="{{ $entry->contact_designation }}" id="cdesignation" class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Organization  <span class="mandat">*</span></label>
                      <input type="text" name="corganization" value="{{ $entry->contact_organization }}" id="corganization" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Twitter Handle  <span class="mandat">*</span></label>
                      <input type="text" name="ctw" id="ctw" value="{{ $entry->contact_twiter }}" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>E-mail   <span class="mandat">*</span></label>
                      <input type="email" name="cemail" value="{{ $entry->contact_email }}" id="cemail" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Mobile Number   <span class="mandat">*</span></label>
                      <input type="number" name="cmobile" value="{{ $entry->contact_mobile }}" id="cmobile" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            <div class="checkbox checkbox-success">
                                <input id="bothsame" class="styled" type="checkbox" onclick="CheckBoth();">
                                <label for="checkbox40">Please check if both are same</label>
                            </div>
                            
                            <div class="panel-title2">CONTACT DETAILS OF THE SIGNING AUTHORITY</div>
                            
                            
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Name <span class="mandat">*</span></label>
                      <input type="text" name="saname" value="{{ $entry->sign_name }}" id="saname" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Designation  <span class="mandat">*</span></label>
                      <input type="text" name="sadesignation" value="{{ $entry->sign_designation }}" required id="sadesignation" class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Organization  <span class="mandat">*</span></label>
                      <input type="text" name="saorganization" value="{{ $entry->sign_organization }}" id="saorganization" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Twitter Handle  <span class="mandat">*</span></label>
                      <input type="text" name="satw" id="satw" value="{{ $entry->sign_twiter }}" required class="form-control input-sm">
                    </div>
                  </div>
                </div>
                            
                            <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>E-mail   <span class="mandat">*</span></label>
                      <input type="email" name="saemail" value="{{ $entry->sign_email }}" id="saemail" required class="form-control input-sm">
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <label>Mobile Number   <span class="mandat">*</span></label>
                      <input type="number" name="samobile" value="{{ $entry->sign_mobile }}" id="samobile" required class="form-control input-sm">
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


      <script type="text/javascript">
        function CheckBoth() {
        if (document.getElementById("bothsame").checked == true) {
                var Name = document.getElementById("cname").value;
                var Designation = document.getElementById("cdesignation").value;
                var Office_Address = document.getElementById("corganization").value;
                var tw = document.getElementById("ctw").value;
                var Email = document.getElementById("cemail").value;
                var Mobile_number = document.getElementById("cmobile").value;
                document.getElementById("saname").value = Name;
                document.getElementById("sadesignation").value = Designation;
                document.getElementById("saorganization").value = Office_Address;
                document.getElementById("satw").value = tw;
                document.getElementById("saemail").value = Email;
                document.getElementById("samobile").value = Mobile_number;
        }
        else {
            document.getElementById("sName").value = "";
            document.getElementById("sDesignation").value = "";
            document.getElementById("sOffice_Address").value = "";
            document.getElementById("sEmail").value = "";
            document.getElementById("sMobile_number").value = "";
        }   
    }
      </script>
@endsection
