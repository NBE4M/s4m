<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class AdminjuryassignController extends Controller
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
	
    public function index()
    {DB::enableQueryLog();
		$jury = DB::table('tbl_idma_2018_users')->where('role','jury')->where('status','active')->get();
		$catentry = array();
		$category = DB::table('tbl_idma_2018_category_entry as c')
            ->join('tbl_idma_2018_entry as e', 'e.id', '=', 'c.eid')            
            ->join('tbl_idma_2018_users as u', 'u.id', '=', 'e.userid')            
            ->join('tbl_idma_2018_subcategory as s', 's.subcategoryid', '=', 'c.SubCatId')            
            ->join('tbl_idma_2018_category as m', 's.categoryid', '=', 'm.categoryid')->where( 'e.status', '=', 'active')->where( 'c.flag', '=', 'yes')/*->whereNotIn('s.subcategoryid', [54,55,56,57,58,59,60,61,62,63,64]) */             
            ->select('s.subcategoryname','s.subcategoryid', 'm.categoryname','u.email','e.userid','c.id','c.eid','e.campaign_name as EntryName')
            ->get();
         
		foreach($category as $k => $cat)
		{
			//echo $cat->CatName.'---'.$cat->SubCatName.'<br>';
			$catentry[$cat->userid]['useremail'] = $cat->email;
			$catentry[$cat->userid]['detail'][$k]['categoryname'] = $cat->categoryname;
			$catentry[$cat->userid]['detail'][$k]['subcategoryname'] = $cat->subcategoryname;
			$catentry[$cat->userid]['detail'][$k]['subcategoryid'] = $cat->subcategoryid;
			$catentry[$cat->userid]['detail'][$k]['entryname'] = $cat->EntryName;
			$catentry[$cat->userid]['detail'][$k]['entrycatid'] = $cat->id;
			$catentry[$cat->userid]['detail'][$k]['entryid'] = $cat->eid;
			$catentry[$cat->userid]['counts'] = count($catentry[$cat->userid]['detail']);
		}
			
			 //echo '<pre>';print_r($catentry);echo '</pre>';exit;
			 //dd($category);
		
        return view('admin/adminassignjury',['jury' => $jury, 'catentry' => $catentry]);
    }
	
	function assignjurydelete($id  = null)
	{
		$catentry = array();
		$jury = DB::table('tbl_idma_2018_users')->where('role','jury')->where('status','active')->get();
		/* $catent = DB::table('cat_entry as c')
            ->join('entry as e', 'c.eid', '=', 'e.id')            
            ->where( 'c.SubCatId', '=', $cat->SubCatId)            
            ->where( 'e.status', '=', 'active')            
            ->select('c.eid', 'e.EntryName', 'e.Nameoftheentrantcompany')
            ->get(); */
		$catent = DB::table('tbl_idma_2018_juryscore as j')->leftJoin('tbl_idma_2018_entry as e', 'j.EntryID', '=', 'e.id')
				->join('tbl_idma_2018_subcategory as s','j.SubCategoryID','=','s.subcategoryid')->join('tbl_idma_2018_category as c', 's.categoryid', '=', 'c.categoryid')
				->where('j.JuryID','=',$id)
				->select('j.SubCategoryID','j.EntryID','s.subcategoryname','c.categoryname','e.name_of_entrant_channel as EntryName','j.JuryID','e.entrant_name_of_organization as Nameoftheentrantcompany')->get();	
		foreach($catent as $k1 => $entryd)
		{
			//$catentry[$k]['entrlist'][$k1]['eid'] = $entryd->eid;
			
			$catentry[$entryd->SubCategoryID]['categoryname'] = $entryd->categoryname;
			$catentry[$entryd->SubCategoryID]['subcategoryname'] = $entryd->subcategoryname;
			
			$catentry[$entryd->SubCategoryID]['subcategoryid'] = $entryd->subcategoryid;
			
			//$catentry[$k]['entrlist'][$k1]['EntryName'] = $entryd->EntryName;
			
			$catentry[$entryd->SubCategoryID]['entrlist'][$entryd->EntryID]['Nameoftheentrantcompany'] = $entryd->Nameoftheentrantcompany;
			$catentry[$entryd->SubCategoryID]['entrlist'][$entryd->EntryID]['EntryName'] = $entryd->EntryName;
			$catentry[$entryd->SubCategoryID]['entrlist'][$entryd->EntryID]['eid'] = $entryd->EntryID;
			
		}  
				
		
		// echo '<pre>';print_r($catentry);echo '</pre>';exit;
		
		
		return view('admin/adminassignjurydelete',['jury' => $jury,'id'=>$id, 'catentry' => $catentry]);
	}
	
	public function assignjury_deletedata(Request $request)
    {
		if(isset($_POST['juryd']) && isset($_POST['eid']))
		{	
			 
				
				foreach($_POST['eid'] as   $v1)
				{
					$arr =  explode("!~",$v1);
					$eid = $arr[0];$cid = $arr[1];
					DB::table('tbl_idma_2018_juryscore')->where('JuryID', '=', $_POST['juryd'])->where('EntryID', '=', $eid)
					->where('SubCategoryID', '=', $cid)->delete();
					/* DB::delete('insert into juryscore (JuryID, EntryID, SubCategoryID) values (?, ?,?)', [$v, $eid,$cid]);			 	  */
			 
				}
			
			 
			
		}
		return redirect('admin/adminjurydeleteassign/'.$_POST['juryd'])->with('message','Entry delete from jury successfully');
    }

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
    public function store(Request $request)
    {
		if(isset($_POST['jury']) && isset($_POST['eid']))
		{	
			foreach($_POST['jury'] as $v){
				
				foreach($_POST['eid'] as   $v1){
				$arr =  explode("!~",$v1);
				$eid = $arr[0];
				$cid = $arr[1];
				$sid = $arr[2];
				DB::enableQueryLog();
				//dd(DB::getQueryLog());
				if(DB::table('tbl_idma_2018_juryscore')->where('cat_entry_id',$cid)->where('JuryID',$v)->count() < 1){
				DB::insert('insert into tbl_idma_2018_juryscore (JuryID, EntryID,cat_entry_id, SubCategoryID)values (?, ?,?,?)', [$v,$eid,$cid,$sid]);
				$msg = 'Success! Entry Assign to jury successfully';
			 	}else{
			 		$msg = 'Already Judged';
			 	}
            DB::table('tbl_idma_2018_category_entry')->where('id', $cid)
            ->update(['flag' => 'yes']);
			 
				}
			
			}
			
		}
		return redirect('/admin/juryassign')->with('message',$msg);
    }

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
}
