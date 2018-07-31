<?php

//namespace App\Http\Controllers\Auth;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Entry;
use App\Entrynominee;
use App\categories;
use App\subcategories;
use DB;
use Validator;
class EntryController extends Controller
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
    public function index(Request $request)
    {
         $this->middleware('auth');
		 $categories   =  Categories::with('Subcategory')->where('flag', '=', '1')->get();		 
		// echo '<pre>';print_r($categories);echo '</pre>';
		return view('entry',['categories' => $categories]);
    }
    protected function validator(array $data)
    {  
           $message = [
             'subcatid.required' => 'Please Select any one subcategory!',       
            ];   
            
        return Validator::make($data, [
            'subcatid' => 'required|array|min:1',
                 
            ],$message  );
    }
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // dd($request);
        $this->middleware('auth');
			$this->validator($request->all())->validate();

			$data = $request;
            if($data['status'] == null){
            $data['status'] = 'active';
            } 
			$userss = Auth::user();		 
			$entry = new Entry;
                $entry->userid = $userss->id;
                $entry->selected_category =$data['forma'];
                $entry->campaign_name =$data['Campaign'];
                $entry->entrant_name_of_organization =$data['Entrantcompany'];                
                $entry->company_activity =$data['comactivity'];
                $entry->main_Creative_Url =$data['main_creative_url'];
                $entry->main_Creative_metaUrl =$data['Reference_mete_url'];
                $entry->entry_brand_name =$data['Brand_name'];
                $entry->entry_company_brand_name =$data['parent_brand'];
                $entry->entrant_web_address =$data['web_address'];
                $entry->twitter_handle =$data['tw'];
                $entry->agency_name= $data['agency_name'];
                $entry->agency_designation =$data['agency_des'];
                $entry->agency_organization= $data['agency_org'];
                $entry->agency_twiter =$data['atw'];
                $entry->date_of_Start_of_Activity =$data['dos'];
                $entry->agency_email =$data['email'];
                $entry->agency_mobile =$data['mobile'];
                $entry->authority_name= $data['a_name'];
                $entry->authority_designation =$data['a_des'];
                $entry->authority_organization= $data['a_org'];
                $entry->authority_twiter= $data['aatw'];
                $entry->covering_note =$data['Covering_note'];
                $entry->concept =$data['Concept'];
                $entry->innovation =$data['Innovation'];
                $entry->execution =$data['Execution'];
                $entry->results =$data['Results'];
                $entry->authority_email= $data['aemail'];
                $entry->authority_mobile =$data['amobile'];
                $entry->brand_contact =$data['cperson'];
                $entry->brand_desig= $data['cdes'];
                $entry->brand_orag= $data['corg'];
                $entry->brand_email= $data['cemail'];           
                $entry->brand_mobile =$data['cmobile'];
                $entry->save();
                //echo '<pre>';print_r($_POST);echo '</pre>';exit;
                $insertedId = $entry->id; 
                $cat_insert = array();
		foreach($request->get('subcatid') as $k=> $v) {
			$cat_insert[$k]['eid'] = $insertedId;
			$cat_insert[$k]['SubCatId'] = $v;
		}
		DB::table('tbl_idma_2018_category_entry')->insert($cat_insert);
		return redirect('/dashboard');
    }




     public function entrynominee(Request $request)
    {
        //dd($request);
            //$this->validator($request->all())->validate();

            $data = $request;
            $userss = Auth::user();      
            $entry = new Entrynominee;
                $entry->userid = $userss->id;
                $entry->forma =$data['forma'];
                $entry->Nominee_name =$data['Nominee_name'];
                $entry->designation =$data['designation'];
                $entry->company =$data['company'];
                $entry->supporting_doc =$data['supporting_doc'];
                $entry->bief_profile =$data['bief_profile'];
                $entry->brand_impact =$data['brand_impact'];
                $entry->pioneer =$data['pioneer'];
                $entry->Aspirants =$data['Aspirants'];
                $entry->profitability =$data['profitability'];
                $entry->Shining_Moments= $data['Shining_Moments'];
                $entry->standards_practices= $data['standards_practices'];
                $entry->contribution =$data['contribution'];
                $entry->contact_name= $data['cname'];
                $entry->contact_designation =$data['cdesignation'];
                $entry->contact_organization =$data['corganization'];
                $entry->contact_twiter =$data['ctw'];
                $entry->contact_mobile =$data['cmobile'];
                $entry->contact_email= $data['cemail'];
                $entry->sign_name= $data['saname'];
                $entry->sign_designation =$data['sadesignation'];
                $entry->sign_organization =$data['saorganization'];
                $entry->sign_twiter =$data['satw'];
                $entry->sign_email =$data['saemail'];
                $entry->sign_mobile= $data['samobile'];
                 $entry->subcategoryname= $data['subcategoryname'];
                $entry->save();
                //echo '<pre>';print_r($_POST);echo '</pre>';exit;
        return redirect('/dashboard');
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
		 $catentry = array();
		 $category = DB::table('tbl_idma_2018_category_entry as c')
            ->join('tbl_idma_2018_subcategory as s', 's.subcategoryid', '=', 'c.SubCatId')            
            ->join('tbl_idma_2018_category as m', 's.categoryid', '=', 'm.categoryid')->where( 'c.eid', '=', $id)              
            ->select('s.subcategoryname','s.region', 'm.categoryname', 's.subcategoryid', 's.categoryid')->get();
         foreach($category as $k => $cat)
        {
            //echo $cat->CatName.'---'.$cat->SubCatName.'<br>';
            $catentry[$cat->categoryid]['categoryname'] = $cat->categoryname;
            $catentry[$cat->categoryid]['detail'][$k]['subcategoryname'] = $cat->subcategoryname;
            //$catentry[$cat->categoryid]['detail'][$k]['language'] = $cat->language;           
        }

       
        return view('viewentrycatd', ['entry' => Entry::findOrFail($id), 'categories' => $catentry ] );
        
        //return view('viewentry', ['entry' => Entry::findOrFail($id), 'categories' => $catentry ] );
       
    }
    public function shownominee($id)
    {           
        return view('viewentrynominee', ['entry' => Entrynominee::findOrFail($id)] );
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            return view('editentrycatd', ['entry' => Entry::findOrFail($id)]);
       
	   //return view('editentry', ['entry' => Entry::findOrFail($id),'subcats'=>$subcategories,'categories'=>$categories,]);
        
    }

    public function editnominee($id)
    {
            return view('edit_nominee', ['entry' => Entrynominee::findOrFail($id)]);
       
       //return view('editentry', ['entry' => Entry::findOrFail($id),'subcats'=>$subcategories,'categories'=>$categories,]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 public function updates(Request $request, $id)
	 {			
			//dd($request);
            $entry = Entry::find($id);
			DB::table('tbl_idma_2018_entry')
            ->where('id', $id)
            ->update(['status' => 'inactive']);
		 return redirect('/dashboard');
	 }
	 
    public function update(Request $request, $id)
    {
		$data = $request;
		//$this->validator($request->all())->validate();
        $entry = Entry::find($id);          
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
                'brand_mobile'=>$data['cmobile']
        ]);
		
	 	return redirect('/dashboard');
    }


     public function entrynomineeupdate(Request $request, $id)
    {
        $data = $request;
        //print_r($data);die;
        //$this->validator($request->all())->validate();
        $entry = Entrynominee::find($id);          
        DB::table('tbl_idma_2018_entrynominee')
            ->where('id', $id)
            ->update([            
                'Nominee_name' => $data['Nominee_name'],
                'designation' =>$data['designation'],
                'company' =>$data['company'],
                'supporting_doc' =>$data['supporting_doc'],
                'bief_profile' =>$data['bief_profile'],
                'brand_impact' =>$data['brand_impact'],
                'pioneer' =>$data['pioneer'],
                'Aspirants' =>$data['Aspirants'],
                'profitability' =>$data['profitability'],
                'Shining_Moments'=> $data['Shining_Moments'],
                'standards_practices'=> $data['standards_practices'],
                'contribution' =>$data['contribution'],
                'contact_name'=> $data['cname'],
                'contact_designation' =>$data['cdesignation'],
                'contact_organization' =>$data['corganization'],
                'contact_twiter' =>$data['ctw'],
                'contact_mobile' =>$data['cmobile'],
                'contact_email'=> $data['cemail'],
                'sign_name'=> $data['saname'],
                'sign_designation' =>$data['sadesignation'],
                'sign_organization' =>$data['saorganization'],
                'sign_twiter' =>$data['satw'],
                'sign_email' =>$data['saemail'],
                'sign_mobile'=> $data['samobile']
        ]);
        
        return redirect('/dashboard');
    }

		public function roles(){
		echo "<br>Test Controller.";
		}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tbl_idma_2018_entry')->where('id','=', $id)->delete();
        DB::table('tbl_idma_2018_category_entry')->where('eid','=', $id)->delete();
        return redirect('/dashboard');
    }
}
