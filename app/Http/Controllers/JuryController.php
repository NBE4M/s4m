<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Entry;
use App\Payment;
use App\Juryrecentry;
use App\juryscore;
use App\PaymentCheque;
use App\Mail\UserEntryissueMail;
use DB;
use App\PaymentNEFT;
use Mail;
 use Ixudra\Curl\Facades\Curl;
 use Illuminate\Support\Facades\Redirect;
 use Illuminate\Support\Facades\Input;
use Validator;


class JuryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function __construct()
    {
        $this->middleware('auth');
    }
   /*dashboard page*/
    public function index()
    { //DB::enableQueryLog();
         $userss = Auth::user();
         $id = $userss->id;
         $judgedata = DB::table('tbl_idma_2018_entry')->join('tbl_idma_2018_category_entry', 'tbl_idma_2018_entry.id', '=', 'tbl_idma_2018_category_entry.eid')->join('tbl_idma_2018_juryscore', 'tbl_idma_2018_category_entry.id', '=', 'tbl_idma_2018_juryscore.cat_entry_id')->join('tbl_idma_2018_subcategory', 'tbl_idma_2018_category_entry.SubCatId', '=', 'tbl_idma_2018_subcategory.subcategoryid')->where('tbl_idma_2018_juryscore.juryid', $userss->id)->select('tbl_idma_2018_juryscore.GrantTotal_In_100percent','tbl_idma_2018_subcategory.subcategoryname','tbl_idma_2018_juryscore.JuryScoreID','tbl_idma_2018_entry.campaign_name','tbl_idma_2018_entry.entry_brand_name','tbl_idma_2018_juryscore.juryID',DB::raw('count(tbl_idma_2018_juryscore.juryid) as total_entry'))->groupBy('tbl_idma_2018_juryscore.juryid','tbl_idma_2018_subcategory.subcategoryname','tbl_idma_2018_juryscore.GrantTotal_In_100percent','tbl_idma_2018_entry.campaign_name','tbl_idma_2018_juryscore.JuryScoreID')
         ->orderby('JuryScoreID', 'desc')->get();

         $entry = DB::select("CALL usp_tbl_idma_2018_entry_randomentry($id)");
         //echo '<pre>';print_r($judgedata);echo '</pre>'; exit;
          //dd($entry);
          foreach($entry as $k => $cat)
        { 
        }
       if(count($judgedata)){
            return view('/judge', ['judgedata' => $judgedata]);
       }else{
            return view('/entry_information' ,['entry' => $cat]);
        }
    }
    /*entry page*/
      public function entry_information()
    { 
         $userss = Auth::user();
         $judgedata = DB::table('tbl_idma_2018_entry')->join('tbl_idma_2018_category_entry', 'tbl_idma_2018_entry.id', '=', 'tbl_idma_2018_category_entry.eid')->join('tbl_idma_2018_juryscore', 'tbl_idma_2018_category_entry.id', '=', 'tbl_idma_2018_juryscore.cat_entry_id')->join('tbl_idma_2018_subcategory', 'tbl_idma_2018_category_entry.SubCatId', '=', 'tbl_idma_2018_subcategory.subcategoryid')->where('tbl_idma_2018_juryscore.juryid', $userss->id)->select('tbl_idma_2018_juryscore.GrantTotal_In_100percent','tbl_idma_2018_subcategory.subcategoryname','tbl_idma_2018_juryscore.JuryScoreID','tbl_idma_2018_entry.campaign_name','tbl_idma_2018_entry.entry_brand_name','tbl_idma_2018_juryscore.juryID',DB::raw('count(tbl_idma_2018_juryscore.juryid) as total_entry'))->groupBy('tbl_idma_2018_juryscore.juryid','tbl_idma_2018_subcategory.subcategoryname','tbl_idma_2018_juryscore.GrantTotal_In_100percent','tbl_idma_2018_entry.campaign_name','tbl_idma_2018_juryscore.JuryScoreID')
         ->orderby('JuryScoreID', 'desc')->get();
         $id = $userss->id;
         $entry = DB::select("CALL usp_tbl_idma_2018_entry_randomentry($id)");
         //dd($entry);
         //print_r($entry);die;
         if (empty($entry)) {
            return view('/judge', ['judgedata' => $judgedata]);
         }else{
          foreach($entry as $k => $cat)
        { 
        }
        //echo '<pre>';print_r($entry);echo '</pre>'; exit;
            return view('/entry_information' ,['entry' => $cat]);
    } }
        /*entry page*/
           public function top5enrty()
    {   /*DB::enableQueryLog();*/
         //$entry = DB::select("CALL usp_tbl_idma_jury_avgscore_get()");
         $catentry = array();
        $category = DB::table('tbl_idma_2018_jurytop as tp')->join('tbl_idma_2018_subcategory as s', 'tp.subcatid', '=', 's.subcategoryid')->orderby('s.subcategoryid','asc')->orderby('tp.avg_score','desc')->get();
            //dd(DB::getQueryLog());
        foreach($category as $k => $cat)
        {
            
$catentry[$cat->subcatid]['subcatname'] = $cat->subcatname;
$catentry[$cat->subcatid]['subcatid'] = $cat->subcatid;
$catentry[$cat->subcatid]['detail'][$k]['eid'] = $cat->eid;
$catentry[$cat->subcatid]['detail'][$k]['catentryid'] = $cat->cat_entryid;
$catentry[$cat->subcatid]['detail'][$k]['entry_brand_name'] = $cat->brand;
$catentry[$cat->subcatid]['detail'][$k]['agency_name'] = $cat->agency;
$catentry[$cat->subcatid]['detail'][$k]['campaign_name'] = $cat->campign;
$catentry[$cat->subcatid]['detail'][$k]['subcategoryname'] = $cat->subcatname;
$catentry[$cat->subcatid]['detail'][$k]['avg_score'] = $cat->avg_score;
$catentry[$cat->subcatid]['counts'] = count($catentry[$cat->subcatid]['detail']);
        }
       //echo '<pre>';print_r($catentry);echo '</pre>'; exit;
            return view('/top5enrty' ,['catentry' => $catentry]);
    }
    /*entry page*/
    /*entry update page*/
     /*entry page*/
      public function entry_updation(Request $request)
    { 
         $userss = Auth::user();
         $id = $userss->id;
         $jid = $request->id;
         $jurydata = DB::select("CALL idma_getjurydata($jid)");
          foreach($jurydata as $k => $cat)
        { 
        }
        //echo '<pre>';print_r($jurydata);echo '</pre>'; exit;
            return view('/entry_updation' ,['entry' => $cat]);
    }
    /*entry page*/
    /*entry update page*/

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*data insert juryrecudentry table*/
    public function recusedatainsert(Request $request)
    {
        $userss = Auth::user();
        $Juryrecentry = Juryrecentry::create([
            'entryid' => $request->entryid,
            'cat_entry_id' => $request->cat_entryid,
            'juryid' => $userss->id,
            'etype' => 'Issue',
            'comment' => $request->comment,
            ]);
            $userdata = array('catentryid'=>$request->cat_entryid,'entryid'=>$request->entryid,'juryid'=>$userss->email,'comment' => $request->comment);
            if($Juryrecentry){
            Mail::to('aakash.e4mnew@gmail.com')->cc(['priyanka.bhadouria@exchange4media.com','nikita.vig@exchange4media.com','aditya.muvvala@exchange4media.com'])->send(new UserEntryissueMail($userdata));
            }
       return redirect()->back()->with('alert', 'Your comment has been submitted, we will resolve the issue shortly');
    }


    public function store(Request $request)
    {   
        //$this->validator($request->all())->validate(); 
        $userss = Auth::user();
        if ($request->submit) {
        $id = $userss->id;
        $eid = $request->entryid;
        $cateid = $request->catentryid;
        $subid = $request->subcate;
        $Strategy = $request->Strategy;
        $Originality_Content = $request->Originality_Content;
        $Clarity = $request->Clarity;
        $Context = $request->Context;
        //$Analysis = $request->production;
        $s1 = $request->score_creative;
        $s2 = $request->score_innovation;
        $s3 = $request->score_effectiveness;
        $s4 = $request->score_production;
                $p_round1 = $request->p_round1;
                $p_round2 = $request->p_round2;
                $p_round3 = $request->p_round3;
               

        $insert =DB::insert("call usp_tbl_idma_2018_insert_juryscore($id,$eid,$cateid,$subid,$Strategy,$Originality_Content, $Clarity,$Context,$s1,$s2,$s3,$s4,$p_round1,$p_round2,$p_round3)");
        //dd($insert);
        //dd();
        return redirect()->back()->with('alert', 'You have successfully judged this entry!');
        }else{
            $Juryrecentry = Juryrecentry::create([
            'entryid' => $request->entryid,
            'cat_entry_id' => $request->catentryid,
            'juryid' => $userss->id,
            'etype' => 'Recuse',
            'comment' => $request->comment,
            ]);
           
            if($Juryrecentry){
                $userdata = array('catentryid'=>$request->catentryid,'entryid'=>$request->entryid,'juryid'=>$userss->email,'comment' => $request->comment);
            Mail::to('aakash.e4mnew@gmail.com')->cc(['priyanka.bhadouria@exchange4media.com','nikita.vig@exchange4media.com','aditya.muvvala@exchange4media.com'])->send(new UserEntryissueMail($userdata));
           /* Mail::to('$myEmail')->cc(['aakash.e4mnew@gmail.com','deep@exchange4media.com','nikita.vig@exchange4media.com'])->send(new UserRegisterMail( $userdata ) ); */
            }
            return redirect()->back()->with('alert', 'Successfully recused this entry');
        }
       
    }
    /*data insert juryscore table*/



     /*data update juryscore table*/
    public function updatejuryentry(Request $request)
    {   DB::enableQueryLog();
        //$this->validator($request->all())->validate(); 
        $userss = Auth::user();
            $id = $userss->id;
            $eid = $request->jid;
            $Strategy = $request->Strategy;
            $Originality_Content = $request->Originality_Content;
            $Clarity = $request->Clarity;
            $Context = $request->Context;
            $s1 = $request->score_creative;
            $s2 = $request->score_innovation;
            $s3 = $request->score_effectiveness;
            $s4 = $request->score_production;
         
            
        $insert =DB::update("call usp_tbl_idma_2018_update_juryscore($id,$eid,$Strategy,$Originality_Content,$Clarity,$Context,$s1,$s2,$s3,$s4)");
      //dd(DB::getQueryLog());
        return redirect('/judge')->with('alert', 'You have successfully updated the entry!'); 
    }
    /*data update juryscore table*/
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    /*update status*/
     public function updatestatus($id)
    {
        $userss = Auth::user($id);
            DB::table('tbl_idma_2018_users')
            ->where('id', $id)
            ->update(['judge_status' => '1']);
         return redirect('/dashboard');
    }
    /*update status*/
}
