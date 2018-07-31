<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Entry;
use App\categories;
use App\subcategories;
use DB; use Validator;
use App\Entrynominee;

class AdminusersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 public function __construct()
    {
        //$this->middleware('auth');
    }
    public function index()
    {
        return view('admin/adminadduser');
    }
	/**
     * Display a Users listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function userslist()
    {
	   $users = DB::table('tbl_idma_2018_users')->where('role', 'subscribe')->orderBy('id', 'desc')->get();
      
       return view('admin/adminuserlist',['users'=> $users]);
    }

    public function catentrylist()
    {
       $users = DB::table('tbl_idma_2018_entrynominee as en')
            ->Join('tbl_idma_2018_users as u', 'en.userid', '=', 'u.id')
            ->select('u.id','u.fname','u.lname','en.*')      
            ->where('u.role', 'subscribe')
            ->where('en.status', 'active')->get();
            //echo '<pre>';print_r($users);echo '</pre>'; exit;
     //  $users = DB::table('entry')->where('role', 'subscribe')->where('status', 'active')->orderBy('id', 'desc')->get();
       return view('admin/adminentrynominelist',['users'=> $users]);
    }

	/**
     * Display a Enry listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	public function entrylist()
    {
		$users = DB::table('tbl_idma_2018_entry as e')
            ->Join('tbl_idma_2018_users as u', 'e.userid', '=', 'u.id')
			->select('u.id','u.email','e.*')	    
			->where('u.role', 'subscribe')
			->where('e.status', 'active')->orderBy('e.id','desc')->get();
            $counte = DB::table('tbl_idma_2018_category_entry as ce')
            ->Join('tbl_idma_2018_entry as e', 'e.id', '=', 'ce.eid')
            ->select('ce.id')      
            ->where('e.status', 'active')->count();
            //echo '<pre>';print_r($counte);echo '</pre>'; exit;
	 //  $users = DB::table('entry')->where('role', 'subscribe')->where('status', 'active')->orderBy('id', 'desc')->get();
       return view('admin/adminentrylist',['users'=> $users,'counte'=>$counte]);
    }
	
	
	public function viewentry($id)
	{
		 $catentry = array();
         $category = DB::table('tbl_idma_2018_category_entry as c')
            ->join('tbl_idma_2018_subcategory as s', 's.subcategoryid', '=', 'c.SubCatId')            
            ->join('tbl_idma_2018_category as m', 's.categoryid', '=', 'm.categoryid')->where( 'c.eid', '=', $id)              
            ->select('s.subcategoryname','s.region', 'm.categoryname', 's.subcategoryid', 's.categoryid')->get();
         //$r = Entry::select('selected_category')->where('id', '=', $id)->get();
         //$catname  = $r[0]->selected_category;

        foreach($category as $k => $cat)
        {
            //echo $cat->CatName.'---'.$cat->SubCatName.'<br>';
            $catentry[$cat->categoryid]['categoryname'] = $cat->categoryname;
            $catentry[$cat->categoryid]['detail'][$k]['subcategoryname'] = $cat->subcategoryname;
            $catentry[$cat->categoryid]['detail'][$k]['region'] = $cat->region;
            //$catentry[$cat->categoryid]['detail'][$k]['language'] = $cat->language;           
        }

		return view('admin/adminviewentry', ['entry' => Entry::findOrFail($id), 'categories' => $catentry ] );
	}



    public function viewentrynominee($id)
    {
         return view('admin/adminviewentrynominee', ['entry' => Entrynominee::findOrFail($id)] );
    }


	public function editentry($id)
	{
	   $subcategories = array();
       $categories   =  Categories::with('Subcategory')->where('flag', '=', '1')->get();
	   $entrym = new Entry();
	   $subcats = $entrym->Subcatid($id);
	   foreach($subcats as $v)
	   {
			 $subcategories[] =$v->SubCatId;
	   }
	   return view('admin/admineditentry', ['entry' => Entry::findOrFail($id),'subcats'=>$subcategories,'categories'=>$categories,]);
	}

	public function updateentry(Request $request, $id)
    {
		$data = $request;
        $id = $request->id;
	//echo '<pre>';print_r($data['id']);echo '</pre>'; exit;
		//$entry->save([            
		DB::table('tbl_idma_2018_entry')
            ->where('id', $id)
            ->update([            
                    'campaign_name' => $data['Campaign'],
                    'entrant_name_of_organization' =>$data['Entrantcompany'],
                    'company_activity' =>$data['comactivity'],
                    'main_Creative_Url' =>$data['main_creative_url'],
                    'main_Creative_metaUrl' =>$data['Reference_mete_url'],
                    'entry_brand_name' =>$data['Brand_name'],
                    'entry_company_brand_name' =>$data['parent_brand'],
                    'entrant_web_address' =>$data['web_address'],
                    'twitter_handle' =>$data['tw'],
                    'agency_name'=> $data['agency_name'],
                    'agency_designation' =>$data['agency_des'],
                    'agency_organization'=> $data['agency_org'],
                    'agency_twiter' =>$data['atw'],
                    'date_of_Start_of_Activity' =>$data['dos'],
                    'agency_email' =>$data['email'],
                    'agency_mobile' =>$data['mobile'],
                    'authority_name'=> $data['a_name'],
                    'authority_designation' =>$data['a_des'],
                    'authority_organization'=> $data['a_org'],
                    'authority_twiter'=> $data['aatw'],
                    'covering_note' =>$data['Covering_note'],
                    'concept' =>$data['Concept'],
                    'innovation' =>$data['Innovation'],
                    'execution' =>$data['Execution'],
                    'results' =>$data['Results'],
                    'authority_email'=> $data['aemail'],
                    'authority_mobile' =>$data['amobile'],
                    'brand_contact' =>$data['cperson'],
                    'brand_desig'=> $data['cdes'],
                    'brand_orag'=> $data['corg'],
                    'brand_email'=> $data['cemail'],           
                    'brand_mobile'=>$data['cmobile'],
                    'status'=>$data['status']
        ]);
            if ($data['status']=='inactive') {
              DB::table('tbl_idma_2018_category_entry')->where('eid',$id)->delete();
            }else{
                $cat_insert = array();
        foreach($request->get('subcatid') as $k=> $v) {
            if(DB::table('tbl_idma_2018_category_entry')->where('eid',$id)->where('SubCatId',$v)->count() < 1){
            $cat_insert[$k]['eid'] = $id;
            $cat_insert[$k]['SubCatId'] = $v;
        }
            
        }
        
       $entrym = new Entry();
       $subcategories =array();
       $subcats = $entrym->Subcatid($id);
       foreach($subcats as $v)
       {
             $subcategories[] =$v->SubCatId;
       }
       $result=array_diff($subcategories,$_POST['subcatid']);
       DB::table('tbl_idma_2018_category_entry')->insert($cat_insert);
       foreach($result as $v1)
       {
        DB::table('tbl_idma_2018_category_entry')->where('eid',$id)->where('SubCatId',$v1)->delete();
        }
            }
	 	
        return redirect('/admin/entry/'.$id);
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
        $data = $request->all();
    	//$data = $request;
          User::create([
            'stitle' => $data['stitle'],
            'name' => $data['name'],
            'email' => $data['email'],
            'designation' => $data['designation'],
            'phone' => $data['mobile'],
            'mobile' => $data['mobile'],
            'department' => $data['department'],
            'howtohear' => '',            
            'organization' => $data['organization'],
            'password' => bcrypt($data['password']),
            'user_pass' => $data['password']
        ]);
		return redirect('/admin/userslist');
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
		$users=  DB::table('tbl_idma_2018_users')->where('role', 'subscribe')->where('id', $id)->first();
        return view('admin/adminedituser',['users' => $users]);
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
        $data = $request->all();
        $user = User::find($id); 
        $user->email = $data['email'];
        $user->status = $data['status'];
		if(!empty($data['password'])){ 
           $user->password = bcrypt($data['password']);
            $user->user_pass = $data['password'];
		}
		$user->save();
		return redirect('/admin/userslist');
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
