@extends('layouts.app')
@section('content')
<div class="container">
          <div class="row">
              <div class="col-lg-8 offset-2">
        <div class="register-form">  
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">Please select category being entered for:</div>
            </div>
            <div class="panel-body">
              <form role="form">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                                      <select class="form-control" name="forma" onchange="this.options[this.selectedIndex].value && (window.open(this.options[this.selectedIndex].value, '_self'));">
                                            <option selected value="">Select</option>
                                            <option value="{{url('entry-abcde')}}">Category A, B, C, D, E</option>
                                            <option value="{{url('category-form')}}">Category E.10 IDMA Person of the Year</option>
                                        </select>
                            
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

<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>  
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
<script>   
    $(document).ready(function () {
        $('#datepicker').datepicker({
          dateFormat: 'dd-mm-yy'
        });
    });
</script> 
<script>
  $('#certify:checkbox').click(function() {
     if ($(this).is(':checked')) {
     $('#checkBtn').prop("disabled", false);
     } else {
     
     $('#checkBtn').attr('disabled',true);
 }
});

</script> 
<script>
  $(".trim_300").on('blur', function(){  
   
        var words = this.value.match(/\S+/g).length;
        //alert(words);
        if (words > 300) {
            // Split the string on first 300 words and rejoin on spaces
            var trimmed = $(this).val().split(/\s+/, 300).join(" ");
            // Add a space at the end to keep new typing making new words
            $(this).val(trimmed + " ");
        }
      });

</script> 
<script>
    function AutoFill(f) {
  if(f.autofill.checked == true) {
    f.name_of_sign_auth.value = f.name_of_entrant_channel.value;
    f.sign_auth_organization.value = f.entrant_name_of_organization.value;
    f.sign_auth_web_address.value = f.entrant_web_address.value;
    f.sign_auth_designation.value = f.entrant_designation.value;
    f.sign_auth_email.value = f.entrant_email.value;
    f.sign_auth_Mobile.value = f.entrant_Mobile.value;      
  }
}
</script>   
@endsection
