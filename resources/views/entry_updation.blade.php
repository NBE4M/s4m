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
                    <div class="pre-scrollableS">
                        <div class="col-md-12 cw top25">
                            <p class="f23">
                             <h2 class="cnt" style="color: #000"></h2>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-12  col-centered bgw"><br><br>
           <form class="form-horizontal" role="form" id="subscribeForm" name="myForm"  method="POST" action="{{ url('/updatejuryentry') }}">
                        {{ csrf_field() }}
                          
                         <input type="hidden" name="entryid" id="hdnid" value="{{$entry->cat_entry_id }}">
                        <input type="hidden" name="jid" id="hdnid" value="{{$entry->JuryScoreID }}">
                        <input type="hidden" name="subcate" id="subcate" value="{{$entry->SubCatId }}">
                            @if (session('alert'))
                            <div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong>  {{ session('alert') }}.
                           
                            </div>
                            @endif
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
                                      <td><b>Brand</b></td>
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
                                                <input type="hidden" name="score_creative" value="{{$entry->score_creative}}">
                                            </div>
                                            <div class="rating">
                                                @if ($entry->Strategy == 0)
                                                  <input id="Presentation_rd0" type="radio" name="Strategy" value="{{$entry->Strategy}}" checked="checked">
                                                 @else
                                                 <input id="Presentation_rd0" type="radio" name="Strategy" value="0"> 
                                                   @endif
                                            </div>
                                            <div class="rating">
                                                @if ($entry->Strategy == 1)
                                                  <input id="Presentation_rd0" type="radio" name="Strategy" value="{{$entry->Strategy}}" checked="checked">
                                              
                                                @else
                                                 <input id="Presentation_rd0" type="radio" name="Strategy" value="1"> 
                                                  @endif
                                            </div>
                                            <div class="rating">
                                               @if ($entry->Strategy == 2)
                                                  <input id="Presentation_rd0" type="radio" name="Strategy" value="{{$entry->Strategy}}" checked="checked">
                                               
                                                 @else
                                                 <input id="Presentation_rd0" type="radio" name="Strategy" value="2"> 
                                                  @endif
                                            </div>
                                            <div class="rating">
                                                @if ($entry->Strategy == 3)
                                                  <input id="Presentation_rd0" type="radio" name="Strategy" value="{{$entry->Strategy}}" checked="checked">
                                                 @else
                                                 <input id="Presentation_rd0" type="radio" name="Strategy" value="3"> 
                                                  @endif
                                            </div>
                                            <div class="rating">
                                               @if ($entry->Strategy == 4)
                                                  <input id="Presentation_rd0" type="radio" name="Strategy" value="{{$entry->Strategy}}" checked="checked">
                                                @else
                                                 <input id="Presentation_rd0" type="radio" name="Strategy" value="4"> 
                                                  @endif 
                                            </div>
                                            <div class="rating">
                                              @if ($entry->Strategy == 5)
                                                  <input id="Presentation_rd0" type="radio" name="Strategy" value="{{$entry->Strategy}}" checked="checked">
                                                @else
                                                 <input id="Presentation_rd0" type="radio" name="Strategy" value="5"> 
                                                  @endif
                                            </div>
                                        </div>
                                        <div class="values-container1">
                                            <div class="poor">
                                                <b>Creativity and Innovation (<span id="lblCreativityInnovation">{{$entry->score_innovation}}</span>%)</b>
                                                  <input type="hidden" name="score_innovation" value="{{$entry->score_innovation}}">
                                            </div>
                                            <div class="rating">
                                                 @if ($entry->CreativityInnovation == 0)
                                                  <input id="Presentation_rd0" type="radio" name="Originality_Content" value="{{$entry->CreativityInnovation}}" checked="checked">
                                                 @else
                                                 <input id="Presentation_rd0" type="radio" name="Originality_Content" value="0"> 
                                                  @endif
                                            </div>
                                            <div class="rating">
                                                @if ($entry->CreativityInnovation == 1)
                                                  <input id="Presentation_rd0" type="radio" name="Originality_Content" value="{{$entry->CreativityInnovation}}" checked="checked">
                                                 @else
                                                 <input id="Presentation_rd0" type="radio" name="Originality_Content" value="1"> 
                                                  @endif
                                            </div>
                                            <div class="rating">
                                                @if ($entry->CreativityInnovation == 2)
                                                  <input id="Presentation_rd0" type="radio" name="Originality_Content" value="{{$entry->CreativityInnovation}}" checked="checked">
                                                 @else
                                                 <input id="Presentation_rd0" type="radio" name="Originality_Content" value="1"> 
                                                  @endif
                                            </div>
                                            <div class="rating">
                                                @if ($entry->CreativityInnovation == 3)
                                                  <input id="Presentation_rd0" type="radio" name="Originality_Content" value="{{$entry->CreativityInnovation}}" checked="checked">
                                                 @else
                                                 <input id="Presentation_rd0" type="radio" name="Originality_Content" value="3"> 
                                                  @endif
                                            </div>
                                            <div class="rating">
                                               @if ($entry->CreativityInnovation == 4)
                                                  <input id="Presentation_rd0" type="radio" name="Originality_Content" value="{{$entry->CreativityInnovation}}" checked="checked">
                                                 @else
                                                 <input id="Presentation_rd0" type="radio" name="Originality_Content" value="4"> 
                                                  @endif
                                            </div>
                                            <div class="rating">
                                                @if ($entry->CreativityInnovation == 5)
                                                  <input id="Presentation_rd0" type="radio" name="Originality_Content" value="{{$entry->CreativityInnovation}}" checked="checked">
                                                 @else
                                                 <input id="Presentation_rd0" type="radio" name="Originality_Content" value="5"> 
                                                  @endif
                                            </div>
                                        </div>
                                        <div class="values-container1">
                                            <div class="poor">
                                                <b>Execution (<span id="lblExecution">{{$entry->score_effectiveness}}</span>%)</b>
                                                  <input type="hidden" name="score_effectiveness" value="{{$entry->score_effectiveness}}">
                                            </div>
                                            <div class="rating">
                                                 @if ($entry->Execution == 0)
                                                  <input id="Clarity_rd0" type="radio" name="Clarity" value="{{$entry->Execution}}" checked="checked">
                                                 @else
                                                 <input id="Clarity" type="radio" name="Clarity" value="0">
                                                  @endif
                                            </div>
                                            <div class="rating">
                                              @if ($entry->Execution == 1)
                                                  <input id="Clarity_rd0" type="radio" name="Clarity" value="{{$entry->Execution}}" checked="checked">
                                                 @else
                                                 <input id="Clarity" type="radio" name="Clarity" value="1">
                                                  @endif
                                            </div>
                                            <div class="rating">
                                               @if ($entry->Execution == 2)
                                                  <input id="Clarity_rd0" type="radio" name="Clarity" value="{{$entry->Execution}}" checked="checked">
                                                 @else
                                                 <input id="Clarity" type="radio" name="Clarity" value="2">
                                                  @endif
                                            </div>
                                            <div class="rating">
                                               @if ($entry->Execution == 3)
                                                  <input id="Clarity_rd0" type="radio" name="Clarity" value="{{$entry->Execution}}" checked="checked">
                                                 @else
                                                 <input id="Clarity" type="radio" name="Clarity" value="3">
                                                  @endif
                                            </div>
                                            <div class="rating">
                                               @if ($entry->Execution == 4)
                                                  <input id="Clarity_rd0" type="radio" name="Clarity" value="{{$entry->Execution}}" checked="checked">
                                                 @else
                                                 <input id="Clarity" type="radio" name="Clarity" value="4">
                                                  @endif
                                            </div>
                                            <div class="rating">
                                               @if ($entry->Execution == 5)
                                                  <input id="Clarity_rd0" type="radio" name="Clarity" value="{{$entry->Execution}}" checked="checked">
                                                 @else
                                                 <input id="Clarity" type="radio" name="Clarity" value="5">
                                                  @endif
                                            </div>
                                        </div>
                                        <div class="values-container1">
                                            <div class="poor">
                                                <b>Results (<span id="lblResults">{{$entry->score_production}}</span>%)</b>
                                                  <input type="hidden" name="score_production" value="{{$entry->score_production}}">
                                            </div>
                                            <div class="rating">
                                                @if ($entry->Results == 0)
                                                  <input id="Context" type="radio" name="Context" value="{{$entry->Results}}" checked="checked">
                                                 @else
                                                 <input id="Context" type="radio" name="Context" value="0">
                                                  @endif
                                            </div>
                                            <div class="rating">
                                                @if ($entry->Results == 1)
                                                  <input id="Context" type="radio" name="Context" value="{{$entry->Results}}" checked="checked">
                                                 @else
                                                 <input id="Context" type="radio" name="Context" value="1">
                                                  @endif
                                            </div>
                                            <div class="rating">
                                               @if ($entry->Results == 2)
                                                  <input id="Context" type="radio" name="Context" value="{{$entry->Results}}" checked="checked">
                                                 @else
                                                 <input id="Context" type="radio" name="Context" value="2">
                                                  @endif
                                            </div>
                                            <div class="rating">
                                                 @if ($entry->Results == 3)
                                                  <input id="Context" type="radio" name="Context" value="{{$entry->Results}}" checked="checked">
                                                 @else
                                                 <input id="Context" type="radio" name="Context" value="3">
                                                  @endif
                                            </div>
                                            <div class="rating">
                                               @if ($entry->Results == 4)
                                                  <input id="Context" type="radio" name="Context" value="{{$entry->Results}}" checked="checked">
                                                 @else
                                                 <input id="Context" type="radio" name="Context" value="4">
                                                  @endif
                                            </div>
                                            <div class="rating">
                                               @if ($entry->Results == 5)
                                                  <input id="Context" type="radio" name="Context" value="{{$entry->Results}}" checked="checked">
                                                 @else
                                                 <input id="Context" type="radio" name="Context" value="5">
                                                  @endif
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
                                        <input type="submit" name="submit" value="UPDATE" onclick="checkvalidate();" id="submit" class="btn btn-success" style="width:150px;">
                                         <a href="{{ URL::previous() }}"  class="btn btn-success" style="width:150px;">BACK</a>
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</SECTION>
@endsection