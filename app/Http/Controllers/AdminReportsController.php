<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;


class AdminReportsController extends Controller
{
    
	public function __construct()
    {
        $this->middleware('auth');
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function index()
    {
        //
    }
	
	/**
     * Display a listing of the user wise entry report.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function Userwisereport()
	{
		
		$jury = DB::table('tbl_idma_2018_users')->where('role','subscribe')->where('status','active')->get();
		$catentry = array();
		$category = DB::table('tbl_idma_2018_category_entry as c')
            ->join('tbl_idma_2018_entry as e', 'e.id', '=', 'c.eid')            
            ->join('tbl_idma_2018_users as u', 'u.id', '=', 'e.userid')            
            ->join('tbl_idma_2018_subcategory as s', 's.subcategoryid', '=', 'c.SubCatId')            
            ->join('tbl_idma_2018_category as m', 's.categoryid', '=', 'm.categoryid')->where( 'e.status', '=', 'active')              
            ->select('m.categoryname','c.eid','c.id as catentryid','m.categoryid','s.subcategoryname','s.region','u.id','u.email','e.id as entid','e.campaign_name','e.userid')->groupBy('m.categoryname','s.subcategoryname','u.id','u.email','c.eid','e.campaign_name','e.userid','m.categoryid','c.id')
            ->get();
           // echo '<pre>';print_r($category);echo '</pre>'; exit;
		foreach($category as $k => $cat)
		{
			//echo $cat->CatName.'---'.$cat->SubCatName.'<br>';
			$catentry[$cat->userid]['useremail'] = $cat->email;
			$catentry[$cat->userid]['detail'][$k]['categoryname'] = $cat->categoryname;
			$catentry[$cat->userid]['detail'][$k]['subcategoryname'] = $cat->subcategoryname;
			$catentry[$cat->userid]['detail'][$k]['region'] = $cat->region;
			$catentry[$cat->userid]['detail'][$k]['entryname'] = $cat->campaign_name;
			$catentry[$cat->userid]['detail'][$k]['entryid'] = $cat->eid;
			$catentry[$cat->userid]['counts'] = count($catentry[$cat->userid]['detail']);
		}
		
		//echo '<pre>';print_r($catentry);echo '</pre>'; exit;
		return view('admin/adminuserentyreport',['usersentry' => $catentry]);
	}

	public function Categorywisereport()
	{
		
		$jury = DB::table('tbl_idma_2018_users')->where('role','subscribe')->where('status','active')->get();
		$catentry = array();
		$category = DB::table('tbl_idma_2018_category_entry as c')
            ->join('tbl_idma_2018_entry as e', 'e.id', '=', 'c.eid')            
            ->join('tbl_idma_2018_users as u', 'u.id', '=', 'e.userid')            
            ->join('tbl_idma_2018_subcategory as s', 's.subcategoryid', '=', 'c.SubCatId')            
            ->join('tbl_idma_2018_category as m', 's.categoryid', '=', 'm.categoryid')->where( 'e.status', '=', 'active')              
            ->select('m.categoryname','s.subcategoryid','c.id as catentryid','m.categoryid','s.subcategoryname','s.region','u.id','u.email','e.id as entid','e.campaign_name','e.userid')->groupBy('m.categoryname','s.subcategoryname','u.id','u.email','e.id','e.campaign_name','e.userid','m.categoryid','s.subcategoryid','c.id')
            ->get();
            //echo '<pre>';print_r($category);echo '</pre>'; exit;
		foreach($category as $k => $cat)
		{
			//echo $cat->CatName.'---'.$cat->SubCatName.'<br>';
			$catentry[$cat->subcategoryid]['subcategoryname'] = $cat->subcategoryname;
			$catentry[$cat->subcategoryid]['detail'][$k]['categoryname'] = $cat->categoryname;
			$catentry[$cat->subcategoryid]['detail'][$k]['subcategoryname'] = $cat->subcategoryname;
			$catentry[$cat->subcategoryid]['detail'][$k]['region'] = $cat->region;
			$catentry[$cat->subcategoryid]['detail'][$k]['entryname'] = $cat->campaign_name;
			$catentry[$cat->subcategoryid]['detail'][$k]['entryid'] = $cat->entid;
			$catentry[$cat->subcategoryid]['detail'][$k]['catentryid'] = $cat->catentryid;
			$catentry[$cat->subcategoryid]['detail'][$k]['categoryid'] = $cat->categoryid;
			$catentry[$cat->subcategoryid]['detail'][$k]['email'] = $cat->email;
			$catentry[$cat->subcategoryid]['counts'] = count($catentry[$cat->subcategoryid]['detail']); 
		}
		
		 
		//echo '<pre>';print_r($catentry);echo '</pre>'; exit;
		return view('admin/adminCategentyreport',['catentry' => $catentry]);
	}
	
	public function Companywisereport()
	{
		
		$jury = DB::table('tbl_idma_2018_users')->where('role','subscribe')->where('status','active')->get();
		$catentry = array();
		$category = DB::table('tbl_idma_2018_category_entry as c')
           ->join('tbl_idma_2018_entry as e', 'e.id', '=', 'c.eid')            
            ->join('tbl_idma_2018_users as u', 'u.id', '=', 'e.userid')            
            ->join('tbl_idma_2018_subcategory as s', 's.subcategoryid', '=', 'c.SubCatId')            
            ->join('tbl_idma_2018_category as m', 's.categoryid', '=', 'm.categoryid')->where( 'e.status', '=', 'active')           
            ->select('s.subcategoryname as SubCatName', 'e.entrant_name_of_organization as Nameoftheentrantcompany', 'm.categoryname as CatName','u.email','e.userid','e.id','e.campaign_name as EntryName')
            ->get();
		foreach($category as $k => $cat)
		{
			//echo $cat->CatName.'---'.$cat->SubCatName.'<br>';
			$catentry[$cat->Nameoftheentrantcompany]['compname'] = $cat->Nameoftheentrantcompany;
			$catentry[$cat->Nameoftheentrantcompany]['detail'][$k]['catname'] = $cat->CatName;
			$catentry[$cat->Nameoftheentrantcompany]['detail'][$k]['SubCatName'] = $cat->SubCatName;
			$catentry[$cat->Nameoftheentrantcompany]['detail'][$k]['entryname'] = $cat->EntryName;
			$catentry[$cat->Nameoftheentrantcompany]['detail'][$k]['Nameoftheentrantcompany'] = $cat->Nameoftheentrantcompany;
			$catentry[$cat->Nameoftheentrantcompany]['detail'][$k]['entryid'] = $cat->id;
			$catentry[$cat->Nameoftheentrantcompany]['detail'][$k]['useremail'] = $cat->email;
			$catentry[$cat->Nameoftheentrantcompany]['counts'] = count($catentry[$cat->Nameoftheentrantcompany]['detail']);  
		}
		
		 
		// echo '<pre>';print_r($catentry);echo '</pre>'; exit;
		return view('admin/adminCompanyreport',['compentry' => $catentry]);
	}
	
	
	
	
	public function Paymentreport()
	{
		
		$jury = DB::table('tbl_idma_2018_users')->where('role','subscribe')->where('status','active')->get();
		$catentry = array();
		$payment = DB::table('tbl_idma_2018_payment as p')                    
            ->join('tbl_idma_2018_users as u', 'u.id', '=', 'p.uid')->where('p.status','1')
            ->select('p.*',  'u.email as useremail')
            ->get();
		 
		
		 
		// echo '<pre>';print_r($catentry);echo '</pre>'; exit;
		return view('admin/adminpaymentreport',['payment' => $payment]);
	}
	public function admindelpaymentreport()
	{
		
		$delonline = DB::table('tbl_idma_2018_deluserpayment')->get();
		$delneft = DB::table('tbl_idma_2018_delneftpayment')->where('Amount','!=',0)->get();
		$delnopay = DB::table('tbl_idma_2018_delneftpayment')->where('Amount','0')->get();
		$delcheck = DB::table('tbl_idma_2018_delchequepayment')->get();
		 //echo '<pre>';print_r($delnopay);echo '</pre>'; exit;
return view('admin/admindelpaymentreport',['payment' => $delonline,'delneft' => $delneft,'delcheck' => $delcheck,'delnopay' => $delnopay]);
	}

	public function neftPaymentreport()
	{DB::enableQueryLog();
		
		$jury = DB::table('tbl_idma_2018_users')->where('role','subscribe')->where('status','active')->get();
		$catentry = array();
		$payment = DB::table('tbl_idma_2018_neftpayment as p')                    
            ->join('tbl_idma_2018_users as u', 'u.id', '=', 'p.uid')
            ->select('p.*',  'u.email as useremail')->where('p.status','1')
            ->get();
		 
		
		 //dd(DB::getQueryLog());
		 //echo '<pre>';print_r($payment);echo '</pre>'; exit;
		return view('admin/adminneftpaymentreport',['payment' => $payment]);
	}
	
	public function chequePaymentreport()
	{
		
		$jury = DB::table('tbl_idma_2018_users')->where('role','subscribe')->where('status','active')->get();
		$catentry = array();
		$payment = DB::table('tbl_idma_2018_chequepayment as p')                    
            ->join('tbl_idma_2018_users as u', 'u.id', '=', 'p.uid')
            ->select('p.*',  'u.email as useremail')->where('p.status','1')
            ->get();
		 
		
		 
		// echo '<pre>';print_r($catentry);echo '</pre>'; exit;
		return view('admin/adminchequepaymentreport',['payment' => $payment]);
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
        //
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
