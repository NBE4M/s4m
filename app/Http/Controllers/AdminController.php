<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Staticpage;
use App\Categories;
use App\Subcategories;
use App\User;
use Validator;
use DB;
use File;
 
class AdminController extends Controller
{
     use ValidatesRequests;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
         
    public function __construct()
    {
        $this->middleware('auth');
       
    }
    public function upload_file()
    {
        $directory = base_path().'/public/img';
        $files = File::allFiles($directory);
         foreach ($files as $attachment) {
            $attached[] = pathinfo($attachment,PATHINFO_BASENAME);
        }
        //echo '<pre>';print_r($attached);echo '</pre>'; exit;
           
        return view('admin/upload_images',['data' => $attached]);
    }


    /*gallery*/
     public function upload_gallery()
    {
        $directory = base_path().'/public/img/gallery';
        $files = File::allFiles($directory);
         foreach ($files as $attachment) {
            $attached[] = pathinfo($attachment,PATHINFO_BASENAME);
        }
        //echo '<pre>';print_r($attached);echo '</pre>'; exit;
           
        return view('admin/upload_galleryimages',['data' => $attached]);
    }

    public function juryreport()
    {
        $jury = DB::table('tbl_idma_2018_users')->where('role','jury')->where('status','active')->get();
        $catentry = array();
        $category = DB::table('tbl_idma_2018_subcategory as s')
            ->join('tbl_idma_2018_category as c', 's.categoryid', '=', 'c.categoryid')            
            ->select('s.subcategoryname', 's.subcategoryid','c.categoryname')
            ->get();
           
        return view('admin/adminjuryreport',['jury' => $jury, 'catentry' => $catentry, 'category' => $category]);
    }

    /*page related all*/

    public function managepagepage()
    {
        $data = DB::table('static_pages')->select('*')->get();
        return view('admin/manage_page',['data' => $data]);
    }

     public function subcategorylist()
    {   $cat = DB::table('tbl_idma_2018_category')->select('*')->get();
        $data = DB::table('tbl_idma_2018_subcategory as s')->join('tbl_idma_2018_category as c', 's.categoryid', '=', 'c.categoryid')->select('c.categoryname','c.categoryid','s.flag','s.subcategoryname','s.subcategoryid')->get();
           
        return view('admin/subcategorylist',['data' => $data,'cat' => $cat]);
    }
     public function categorylist()
    {
        $data = DB::table('tbl_idma_2018_category')->select('*')->get();
           
        return view('admin/categorylist',['data' => $data]);
    }

    public function addcat(Request $request)
    {
        $data = new Categories();
        $data->categoryname = $request->categoryname;
        $data->flag = 1;
        $data->save();
        return redirect('/admin/categorylist');
    }
   
    public function updatecats(Request $request)
    {
        Categories::where('categoryid',$request->cat_id)->update(['categoryname' => $request->categorynameedit,'flag' => $request->status]);
        return redirect('/admin/categorylist');
    }

     public function addsubcat(Request $request)
    {
        $data = new Subcategories();
        $data->categoryid = $request->categoryid;
        $data->subcategoryname = $request->subcategoryname;
        $data->flag = 1;
        $data->save();
        return redirect('/admin/subcategorylist');
    }
    public function updatesubcat(Request $request)
    {//dd($request);
        Subcategories::where('subcategoryid',$request->subcat_id)->update([
            'subcategoryname' => $request->subcategorynameedit,
            'categoryid' => $request->categoryidedit,
            'flag'=>$request->status,
        ]);
        return redirect('/admin/subcategorylist');
    }
    

     public function staticpages(Request $request)
    {
        
        $slugs = $request->input('slug');
        $slug=str_replace(' ', '-' ,$slugs);
        //dd($slug);
            $static = new Staticpage;
            $static->title=$request->title;
            $static->slug =$slug;
            $static->short_story=$request->short_story;
            $static->full_story=$request->full_story;
            $static->meta_title=$request->meta_title;
             $static->meta_keyword=$request->meta_keyword;
            $static->meta_description=$request->meta_description;
            $static->publish_date=$request->publish_date;
            $static->user_id=$request->user_id;
            $static->save();          

        return redirect('admin/managepage');
    }  

    public function editpages(Request $request)
      {
        $edit = Staticpage::where('id',$request->id)->get();
        return view('admin/edit_page',compact('edit'));
      }  

    public function updatepage(Request $request)
      {
        $update = Staticpage::where('id',$request->id)->update([
          'title' => $request->title,
          'slug' => $request->slug,
          'short_story' => $request->short_story,
          'full_story' => $request->full_story,
          'meta_title' => $request->meta_title,
          'meta_keyword' => $request->meta_keyword,
          'meta_description' => $request->meta_description,
          'publish_date' => $request->publish_date,
        ]);
        return redirect('admin/managepage');
      } 


      public function dropzoneUploadFile(Request $request){
        $imageext = $request->file->getClientOriginalExtension();
        if ($imageext=='css') {
        $imageName = $request->file->getClientOriginalName();
        $request->file->move(public_path('css'), $imageName);
        }
        if ($imageext=='js') {
        $imageName = $request->file->getClientOriginalName();
        $request->file->move(public_path('js'), $imageName);
        }else{
        $imageName = $request->file->getClientOriginalName();
        $request->file->move(public_path('img'), $imageName);
        return response()->json(['success'=>$imageName]);
      }
    }


    public function dropzoneUploadgallery(Request $request){
        $imageName = $request->file->getClientOriginalName();
        $request->file->move(public_path('img/gallery'), $imageName);
        return response()->json(['success'=>$imageName]);
    }
    



     /*page related all*/
    
    public function juryreport_report( Request $request )
    {
        
        $data = $request->all();
        if($data['jury'] == 'all')
        {
            $jury = 1;$opj = '>=';
        }else{
            $jury = $data['jury'];$opj = '=';
        }
        if($data['subcat'] == 'all')
        {
            $subcat = 1;$ops = '>=';
        }else{
            $subcat = $data['subcat'];$ops = '=';
        }
        $jurys = DB::table('tbl_idma_2018_users')->where('role','jury')->where('status','active')->get();
        $catentry = array();
        
        $catentry = DB::table('tbl_idma_2018_juryscore as j')->Join('tbl_idma_2018_entry as e', 'j.EntryID', '=', 'e.id')->Join('tbl_idma_2018_category_entry as ce', 'j.cat_entry_id', '=', 'ce.id')
        ->join('tbl_idma_2018_subcategory as s','j.SubCategoryID','=','s.subcategoryid')->join('tbl_idma_2018_category as c', 's.categoryid', '=', 'c.categoryid')
        ->join('tbl_idma_2018_users as u', 'j.JuryID', '=', 'u.id')->where('j.JuryID',$opj,$jury)->where('j.subcategoryid',$ops,$subcat)
            ->select('j.GrantTotal_In_100percent','j.cat_entry_id','j.GrantTotal','s.subcategoryname as SubCatName','c.categoryname as CatName','e.entry_brand_name','e.campaign_name','j.JuryID','e.id as entryid','ce.id as catentryid','e.entrant_name_of_organization as Nameoftheentrantcompany','u.email')->orderBy('JuryId','desc')->get();
    
    $category = DB::table('tbl_idma_2018_subcategory as s')
            ->join('tbl_idma_2018_category as c', 's.categoryid', '=', 'c.categoryid')            
            ->select('s.subcategoryname', 's.subcategoryid','s.region','s.serial_num', 'c.categoryname')
            ->orderBy('serial_num','asc')
            ->get();    
            //dd($category);
        
    //  echo '<pre>';print_r($catentry);echo '</pre>'; exit;
        return view('admin.adminjuryreport',['jury' => $jurys, 'catentry' => $catentry, 'category' => $category]);
    }
    
    public function index()
    {

      $contval = DB::select("CALL usp_tbl_idma_2018_info()");
      //echo '<pre>';print_r($contval);echo '</pre>'; exit;
        return view('admin/admin')->with(compact('contval'));
    }
    public function addjury()
    {
        return view('admin/adminaddjury');
    }
    //protected function validator(array $data)
    /* public function validator(Request $request)
    {
        $data = $request->all();
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'designation' => 'required|max:255',
            'mobile' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    } */
    
     public function addNewjury( Request $request){
    
       
       $this->validate($request, [
            'email' => 'required|unique:tbl_idma_2018_users',
        ]);
        $data = $request->all();
        //$data = $request;
          User::create([
            'title' => $data['title'],
            'name' => $data['username'],
            'email' => $data['email'],
            'designation' => '0',
            'phone' => '',
            'mobile' => '1234567890',
            'department' => '',
            'howtohear' => '',
            'role' => 'jury',
            'organization' => 'organization',
            'password' => bcrypt($data['password']),
            'user_pass' => $data['password'],
            'remember_token' => $data['_token'],
            'stitle' => $data['title'],
            'sname' => $data['username'],
            'semail' => $data['email'],
            'sdesignation' => '0',
            'sLandlineno' => '1234567890',
            'smobile' => '1234567890',
            'Facebook' => 'fb',
            'twiterh' => 'twt',
            'gst' => '09AAECA0652M1ZL',
            'Pincode' => '202020',
            'city' => 'Delhi',
            
        ]);
        return redirect('admin/jurylist');
    }  
    public function jurylist(){
         $jury = DB::table('tbl_idma_2018_users as u')->leftjoin('tbl_idma_2018_juryscore as s', 's.juryid', '=', 'u.id')->where('u.role', 'jury')->select(DB::raw('count(s.score) as count'),'u.*')->groupby('u.id')->orderBy('u.id', 'desc')->get();
         
           $usersentrysum1 = DB::table('tbl_idma_2018_juryscore as j')->leftjoin('tbl_idma_2018_entry as e','j.EntryID', '=','e.id')->where('e.status', 'active')->where('j.firstround', 1)->select(DB::raw('j.JuryScoreID'))->get();
          $usersentrysum2 = DB::table('tbl_idma_2018_juryscore as j')->leftjoin('tbl_idma_2018_entry as e','j.EntryID', '=','e.id')->where('e.status', 'active')->where('j.secondround', 2)->select(DB::raw('j.JuryScoreID'))->get();
           $usersentrysum3 = DB::table('tbl_idma_2018_juryscore as j')->leftjoin('tbl_idma_2018_entry as e','j.EntryID', '=','e.id')->where('e.status', 'active')->where('j.thirdround', 3)->select(DB::raw('j.JuryScoreID'))->get();
         //echo '<pre>';print_r($jury);echo '</pre>'; exit;
        return view('admin/adminjurylist', ['jury' => $jury,'usersentrysum1' => $usersentrysum1,'usersentrysum2' => $usersentrysum2,'usersentrysum3' => $usersentrysum3]);
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
    public function show()
    {
        $total = count(DB::table('tbl_idma_2018_entry as e')->join('tbl_idma_2018_category_entry as ce', 'ce.eid', '=', 'e.id')->where('e.status', 'active')->get());
        $avl = count(DB::table('tbl_idma_2018_entry as e')->join('tbl_idma_2018_category_entry as ce', 'ce.eid', '=', 'e.id')->where('e.status', 'active')->where('flag','yes')->get());
        $entrystatus = DB::table('tbl_idma_2018_entry as e')
        ->leftjoin('tbl_idma_2018_category_entry as ce', 'ce.eid', '=', 'e.id')
        ->leftjoin('tbl_idma_2018_subcategory as s', 'ce.SubCatId', '=', 's.subcategoryid')
        ->where('ce.flag', 'no')->where('e.status', 'active')
        ->orderBy('ce.id', 'desc')->get();

         return view('admin/entrystatus',['entrystatus' => $entrystatus,'total'=>$total,'avl'=>$avl]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }
/**
     * Show the form for Jury editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editjury($id)
    {
        $jury=  DB::table('tbl_idma_2018_users')->where('role', 'jury')->where('id', $id)->first();
        return view('admin/admineditjury',['jury' => $jury]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatejury(Request $request, $id)
    {
        
        $data = $request->all();
        $user = User::find($id); 
        $user->name = $data['username'];
        $user->email = $data['email'];
        $user->status = $data['status'];
        if(!empty($data['password'])){ 
           $user->password = bcrypt($data['password']);
            $user->user_pass = $data['password'];
        }
        $user->save();
        return redirect('admin/jurylist');
    }
    public function juryissuereport()
    {//DB::enableQueryLog();
        $jury = DB::table('tbl_idma_2018_users')->where('role','jury')->where('status','active')->get();
        $category = DB::table('tbl_idma_2018_juryrecusedentry as r')
            ->join('tbl_idma_2018_entry as e', 'r.entryid', '=', 'e.id')
            ->join('tbl_idma_2018_users as u', 'r.juryid', '=', 'u.id')            
            ->select('u.email','e.campaign_name','r.id','r.etype','r.comment','r.cat_entry_id','r.entryid')
            ->get();
            //dd($category);
            //echo '<pre>';print_r($category);echo '</pre>'; exit;
        return view('admin/adminjuryissuereport',['jury' => $category]);
    }
    public function update(Request $request)
    {
        $rq = $request->checkItem;
       
        foreach ($rq as $id) {
            
            $updte = DB::table('tbl_idma_2018_category_entry')->where('id',$id)->update(['flag'=>'yes']);
        }
        
        return redirect('admin/avaibleentry');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //dd($id);
       $del = DB::table('tbl_idma_2018_juryrecusedentry')->where('id',$id)->delete();
       return redirect('admin/juryissuereport');
    }


    public function alreadyassign()
    {
        $total = count(DB::table('tbl_idma_2018_entry as e')->join('tbl_idma_2018_category_entry as ce', 'ce.eid', '=', 'e.id')->where('e.status', 'active')->get());
        $avl = count(DB::table('tbl_idma_2018_entry as e')->join('tbl_idma_2018_category_entry as ce', 'ce.eid', '=', 'e.id')->where('e.status', 'active')->where('flag','no')->get());
       $alrdy =DB::table('tbl_idma_2018_entry as e')
        ->leftjoin('tbl_idma_2018_category_entry as ce', 'ce.eid', '=', 'e.id')
        ->leftjoin('tbl_idma_2018_subcategory as s', 'ce.SubCatId', '=', 's.subcategoryid')
        ->where('ce.flag', 'yes')->where('e.status', 'active')
        ->orderBy('ce.id', 'desc')->get();
       return view('admin/alreadyentry',['alrdy' => $alrdy,'total'=>$total,'avl'=>$avl]);
    }
}
