@extends('layouts.app')

@section('content')
<script type="text/javascript">
    function hideshow() {
        if (document.getElementById("ticket").style.display == "block") {
            document.getElementById("ticket").style.display = "none";
        }
        else if (document.getElementById("ticket").style.display == "none") {
            document.getElementById("ticket").style.display = "block";
            document.getElementById("ticket").style.float = "right";
            document.getElementById("ticket").style.padding = "10px";
            document.getElementById("ticket").style.border = "1px solid #ccc";
        }
    }
</script>
 <div class="container">
          <div class="row">
              <div class="col-lg-12">
        <div class="entry-form">   
                 <div class="panel panel-default">
            <div class="panel-heading">
              <div class="panel-title">ENTRY DETAILS</div>
            </div> 
            <div class="container">
  <div class="tab-content">
    <div id="entryshow">
     <div class="col-md-12 cw col-centered">

                    <center>
                    <span id="ctl00_ContentPlaceHolder1_nofound"></span>
                    </center>
                    <div>
           <script type="text/javascript">
    function checkvalidate(){
 if($('input[name="Strategy"]:checked').length === 0) {
      alert( "Please select one Strategy option!" );
      return false;
   }
   if($('input[name="Originality_Content"]:checked').length === 0) {
      alert( "Please select one Creativity and Innovation  option!" );
      return false;
   }
   if($('input[name="Clarity"]:checked').length === 0) {
      alert( "Please select one Execution option!" );
      return false;
   }
   if($('input[name="Context"]:checked').length === 0) {
      alert( "Please select one Results option!" );
      return false;
   }
}
</script>
</nav>

<script type="text/javascript">
    function clickconfirm() {
        var retVal = confirm("Do you want to continue ?");
        if (retVal == true) {
            return true;
        } else {
            return false;
        }
    }
</script>
<style type="text/css">
  .judgment-box {
    width: 100%;
    float: left;
    background: #00aeef;
    border: 0;
    color: #fff;
    font-size: 18px;
    padding: 10px;
}
.judgment-box .poor {
    width: 196px;
    text-align: right;
    height: 20px;
    padding-left: 10px;
    font-weight: bold;
    float: left;
}
.judgment-box .rating {
    width: 30px;
    height: 20px;
    padding-left: 10px;
    font-weight: bold;
    float: left;
}
.judgment-box .excellent {
    width: 210px;
    height: 20px;
    padding-left: 10px;
    font-weight: bold;
    float: left;
}
.scoring-container {
    width: 490px;
    float: left;
    margin-top: 5px;
}
.scoring-discription {
    width: 700px;
    height: 216px;
    font-size: 15px;
    float: left;
    color: #333;
    background: #FFF;
    text-align: left;
    padding-left: 10px;
    padding-top: 10px;
    padding-bottom: 10px;
}
.values-container1 {
    width: 700px;
    float: left;
    background: #FFF;
    color: #333;
    font-size: 12px;
}
.values-container1 .rating {
    width: 30px;
    float: left;
    border: 1px #E2E1E1 solid;
    padding-left: 6px;
    padding-top: 11px;
    padding-bottom: 11px;
}
.values-container1 .poor {
    width: 210px;
    float: left;
    text-align: right;
    border: 1px #E2E1E1 solid;
    padding-left: 5px;
    padding-top: 12px;
    padding-bottom: 15px;
    padding-right: 5px;
}
</style>
        <div class="col-md-12 mbottom100">
             <a href="{{ url('/judge') }}"><input type="button" value="Your Dashboard" class="btn btn-danger"></a>
             <a href="javascript:;" onclick="javascript:hideshow();" style="float: right;">
                            <input type="button" value="Ticket" class="btn btn-danger">
                        </a>
                        <div id="ticket" style="display:none;margin-top: -21px;    margin-right: 69px;">
                             <form class="form-horizontal" role="form" id="subscribeForm"  method="POST" action="{{ url('/recusedatainsert') }}">
                               <input type="hidden" name="entryid" id="entryid" value="{{$entry->id }}">
                                <input type="hidden" name="cat_entryid" id="cat_entryid" value="{{$entry->cat_entry_id }}">
                        {{ csrf_field() }}
                            <table width="100%">
                                <tbody><tr>
                                    <td>Comments/Issue : </td>
                                    <td>
                                        <textarea name="comment" id="comment" required=""></textarea></td>
                                        <td><input type="submit" name="submit" value="SEND" id="submit" ></td>
                                        
                                </tr>
                               
                            </tbody>
                          </table>
                              </form>
                        </div>
                  

                    <div class="pre-scrollableS">
                        <div class="col-md-12 cw top25">
                            <p class="f23">
                             <h2 class="cnt" style="color: #000"></h2>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12  col-centered bgw"><br><br>
       <form class="form-horizontal" role="form" id="subscribeForm" name="myForm"  method="POST" action="{{ url('/insertdata') }}">
                        {{ csrf_field() }}
                            @if (session('alert'))
                            <div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong>  {{ session('alert') }}.
                           
                            </div>
                            @endif
                        <input type="hidden" name="entryid" id="hdnid" value="{{$entry->id }}">
                        <input type="hidden" name="catentryid" id="hdnid" value="{{$entry->cat_entry_id }}">
                        <input type="hidden" name="p_round1" id="hdnid" value="{{$entry->p_round1 }}">
                        <input type="hidden" name="p_round2" id="hdnid" value="{{$entry->p_round2 }}">
                        <input type="hidden" name="p_round3" id="hdnid" value="{{$entry->p_round3 }}">
                        <input type="hidden" name="subcate" id="subcate" value="{{$entry->SubCatId }}">

                        <table class="table table-bordered">
                                      <tbody>
                                      <tr>
                                      <td><b>Category EntryID</b></td>
                                      <td> {{ $entry->cat_entry_id }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>EntryID</b></td>  
                                      <td>  {{ $entry->id }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>Category</b></td>
                                      <td> {{ $entry->categoryname }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>SubCategory</b></td>
                                      <td>{{ $entry->subcategoryname }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>Campaign</b></td>  
                                      <td>  {{ $entry->campaign_name }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>Brand </b></td>
                                      <td> {{ $entry->entry_brand_name }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>Main Creative URL</b></td>  
                                      <td> <a href="{{ $entry->main_Creative_Url }}" target="_blank">{{ $entry->main_Creative_Url }}</a></td>
                                      </tr>

                                       <tr>
                                      <td><b>Reference material URL</b></td>  
                                      <td> <a href="{{ $entry->main_Creative_metaUrl }}" target="_blank">{{ $entry->main_Creative_metaUrl }}</a></td>
                                      </tr>
                                      <tr>
                                      <td><b>Covering Note</b></td>
                                      <td style="text-align: justify;"> {{ $entry->covering_note }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>Strategy</b></td>
                                       <td style="text-align: justify;"> {{ $entry->concept }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>Creativity & Innovation</b></td>  
                                       <td style="text-align: justify;">  {{ $entry->innovation }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>Execution</b></td>
                                      <td style="text-align: justify;"> {{ $entry->execution }}</td>
                                      </tr>
                                       <tr>
                                      <td><b>Results</b></td>  
                                      <td style="text-align: justify;">  {{ $entry->results }}</td>
                                      </tr>
                                      <tr>
                                      <td><b>Date Of Activity</b></td>
                                      <td> {{ $entry->date_of_Start_of_Activity }}</td>
                                      </tr>
                                      </tbody>
                                      </table>
                                    <table id="froscoring">
                                    <tbody><tr>
                                    <td>&nbsp;
                                    </td>
                                    <td>
                                    <div class="judgment-box">
                                        <strong>Score</strong><br>
                                    </div>
                                    <div class="judgment-box">
                                        <div class="poor">
                                            Poor
                                        </div>
                                        <div class="rating">
                                            0
                                        </div>
                                        <div class="rating">
                                            1
                                        </div>
                                        <div class="rating">
                                            2
                                        </div>
                                        <div class="rating">
                                            3
                                        </div>
                                        <div class="rating">
                                            4
                                        </div>
                                        <div class="rating">
                                            5
                                        </div>
                                        <div class="excellent">
                                            Excellent
                                        </div>
                                    </div>
                                    <div class="scoring-container">
                                      <!--  @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                        <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                        </ul>
                                        </div>
                                        @endif  -->
                                        <div class="values-container1">
                                            <div class="poor">
                                                <b>Strategy (<span id="lblStrategy">{{$entry->score_creative}}</span>%)</b>
                                                <input type="hidden" onkeydown="return false" name="score_creative" value="{{$entry->score_creative}}">
                                            </div>
                                            <div class="rating">
                                                <input id="Presentation_rd0" onkeydown="return false" type="radio" name="Strategy" value="0">
                                            </div>
                                            <div class="rating">
                                                <input id="Presentation_rd1" onkeydown="return false" type="radio" name="Strategy" value="1">
                                            </div>
                                            <div class="rating">
                                                <input id="Presentation_rd2" onkeydown="return false" type="radio" name="Strategy" value="2">
                                            </div>
                                            <div class="rating">
                                                <input id="Presentation_rd3" onkeydown="return false" type="radio" name="Strategy" value="3">
                                            </div>
                                            <div class="rating">
                                                <input id="Presentation_rd4" type="radio" name="Strategy" value="4">
                                            </div>
                                            <div class="rating">
                                                <input id="Presentation_rd5" type="radio" name="Strategy" value="5">
                                            </div>
                                        </div>
                                        <div class="values-container1">
                                            <div class="poor">
                                                <b>Creativity and Innovation (<span id="lblCreativityInnovation">{{$entry->score_innovation}}</span>%)</b>
                                                  <input type="hidden" name="score_innovation" onkeydown="return false" value="{{$entry->score_innovation}}">
                                            </div>
                                            <div class="rating">
                                                <input id="Originality_Content_rd0" onkeydown="return false" type="radio" name="Originality_Content" value="0">
                                            </div>
                                            <div class="rating">
                                                <input id="Originality_Content_rd1" onkeydown="return false" type="radio" name="Originality_Content" value="1">
                                            </div>
                                            <div class="rating">
                                                <input id="Originality_Content_rd2" onkeydown="return false" type="radio" name="Originality_Content" value="2">
                                            </div>
                                            <div class="rating">
                                                <input id="Originality_Content_rd3" onkeydown="return false" type="radio" name="Originality_Content" value="3">
                                            </div>
                                            <div class="rating">
                                                <input id="Originality_Content_rd4" onkeydown="return false" type="radio" name="Originality_Content" value="4">
                                            </div>
                                            <div class="rating">
                                                <input id="Originality_Content_rd5" onkeydown="return false" type="radio" name="Originality_Content" value="5">
                                            </div>
                                        </div>
                                        <div class="values-container1">
                                            <div class="poor">
                                                <b>Execution (<span id="lblExecution">{{$entry->score_effectiveness}}</span>%)</b>
                                                  <input type="hidden" name="score_effectiveness" onkeydown="return false" value="{{$entry->score_effectiveness}}">
                                            </div>
                                            <div class="rating">
                                                <input id="Clarity_rd0" type="radio" onkeydown="return false" name="Clarity" value="0">
                                            </div>
                                            <div class="rating">
                                                <input id="Clarity_rd1" type="radio" onkeydown="return false" name="Clarity" value="1">
                                            </div>
                                            <div class="rating">
                                                <input id="Clarity_rd2" type="radio" onkeydown="return false" name="Clarity" value="2">
                                            </div>
                                            <div class="rating">
                                                <input id="Clarity_rd3" type="radio" onkeydown="return false" name="Clarity" value="3">
                                            </div>
                                            <div class="rating">
                                                <input id="Clarity_rd4" type="radio" onkeydown="return false" name="Clarity" value="4">
                                            </div>
                                            <div class="rating">
                                                <input id="Clarity_rd5" type="radio" onkeydown="return false" name="Clarity" value="5">
                                            </div>
                                        </div>
                                        <div class="values-container1">
                                            <div class="poor">
                                                <b>Results (<span id="lblResults">{{$entry->score_production}}</span>%)</b>
                                                  <input type="hidden" name="score_production" onkeydown="return false" value="{{$entry->score_production}}">
                                            </div>
                                            <div class="rating">
                                                <input id="Context_rd0" type="radio" onkeydown="return false" name="Context" value="0">
                                            </div>
                                            <div class="rating">
                                                <input id="Context_rd1" type="radio" onkeydown="return false" name="Context" value="1">
                                            </div>
                                            <div class="rating">
                                                <input id="Context_rd2" type="radio" onkeydown="return false" name="Context" value="2">
                                            </div>
                                            <div class="rating">
                                                <input id="Context_rd3" type="radio" name="Context" value="3">
                                            </div>
                                            <div class="rating">
                                                <input id="Context_rd4" type="radio" onkeydown="return false" name="Context" value="4">
                                            </div>
                                            <div class="rating">
                                                <input id="Context_rd5" type="radio" onkeydown="return false" name="Context" value="5">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="scoring-discription">
                                        <fieldset>
                                            <legend>Scoring Notes : </legend>
                                            <ul>
                                                <li>0 - Doesn't meet requirement of scoring guidelines by any means</li>
                                                <li>1 - below average in meeting scoring guidelines</li>
                                                <li>2 - average in meeting scoring guidlines</li>
                                                <li>3 - slightly above average in meeting scoring guidelines</li>
                                                <li>4 - above average in meeting scoring guidelines</li>
                                                <li>5 - hit a home run in meeting scoring guideline.</li>
                                            </ul>
                                        </fieldset>
                                    </div>
                                </td>
        <td>&nbsp;
                                </td>
        <td>&nbsp;
                                </td>
    </tr>
    <tr>
        <td>&nbsp;
                                </td>
        <td>
                                    <br>
                                    <br>
                                    <div align="center" style="background-color: #ccc; padding: 8px;">
                                        <input type="submit" name="recusebtn" value="RECUSE" onclick="return confirm('Are you sure you want to recuse this entry');" id="recusebtn" class="btn btn-danger">
                                    &nbsp;&nbsp;
                                        <input type="submit" onclick="return checkvalidate();" name="submit" value="SUBMIT &amp; GO NEXT" id="submit" class="btn btn-success" style="width:250px;">
                                        &nbsp;&nbsp;
                                    </div>
                                </td>
        <td>&nbsp;
                                </td>
        <td>&nbsp;
                                </td>
    </tr>
</tbody></table>
</form>
                    </div>
                    </div>
    </div>
  </div>
</div>  
            <!--form-->
                    
                        </div>
                        <!--form-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
