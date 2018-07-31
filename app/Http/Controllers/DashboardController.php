<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Entry;
use App\Payment;
use App\PaymentCheque;
use DB;
use App\PaymentNEFT;
use Mail;
use App\Mail\UserRegisterMail;
use App\Mail\UserPaymentMail;
use App\Mail\UserPaymentchequeMail;
use App\Mail\UserPaymentneftMail;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Validator;

class DashboardController extends Controller
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
    { DB::enableQueryLog();
        $userss = Auth::user();
            $entry = DB::table('tbl_idma_2018_entry as e')->join('tbl_idma_2018_category_entry as ce', 'e.id', '=', 'ce.eid')->where('e.userid', $userss->id)
         ->where('e.status', 'active')->select('e.*', DB::raw('count(ce.eid) as total_entry'))->groupBy('e.id')->get();
         $entrynominee = DB::table('tbl_idma_2018_entrynominee as en')->where('en.userid', $userss->id)
         ->where('en.status', 'active')->select('en.*', DB::raw('count(en.id) as total_entrynominee'))->groupBy('en.id')->get();
         //dd(DB::getQueryLog());
         //echo '<pre>';print_r($entrynominee);echo '</pre>'; exit;
        $pcounts = Payment::where('status', '1')->where('uid', $userss->id)->count();
        $PaymentCheque = PaymentCheque::where('status', '1')->where('uid', $userss->id)->count();
        $PaymentNEFT = PaymentNEFT::where('status', '1')->where('uid', $userss->id)->count();
         //echo '<pre>';print_r($PaymentCheque);echo '</pre>'; exit;
       if(count($entry)>0 || count($entrynominee)>0){
            return view('dashboard', ['entry' => $entry,'entrynominee' => $entrynominee ,'pcounts'=>$pcounts,'PaymentCheque'=>$PaymentCheque,'PaymentNEFT'=>$PaymentNEFT]);
        }else{
            return redirect('/entry');
        }
    }
    /*dashboard page*/
    /*online payment  page*/
    public function make_online_payment()
    {
        DB::enableQueryLog();
    $user = Auth::user(); 
     $entry = DB::table('tbl_idma_2018_entry')->join('tbl_idma_2018_category_entry', 'tbl_idma_2018_entry.id', '=', 'tbl_idma_2018_category_entry.eid')->where('tbl_idma_2018_entry.userid', $user->id)
         ->where('tbl_idma_2018_entry.status', 'active')->count('tbl_idma_2018_category_entry.eid');

            $entrydata = Entry::join('tbl_idma_2018_category_entry', 'tbl_idma_2018_entry.id', '=', 'tbl_idma_2018_category_entry.eid')->join('tbl_idma_2018_subcategory', 'tbl_idma_2018_category_entry.SubCatId', '=', 'tbl_idma_2018_subcategory.subcategoryid')->select('region')->where('tbl_idma_2018_entry.userid', $user->id)
         ->where('tbl_idma_2018_entry.status', 'active')->get();
        
//dd(DB::getQueryLog());
//echo '<pre>';print_r($entry);echo '</pre>'; exit;
        $totalamount='0';
                $today = date('y-m-d');
                $erly= date('18-03-29');
                $deadline= date('18-06-09');
                $edeadline= date('18-06-19');
                // if ($today <  $erly) {
                //      $fee = 10000;
                // }
                //  if ($today > $erly and  $today <  $deadline) {
                //      $fee = 12000;
                // }
                 // if ($today > $deadline and $today < $edeadline) {
                     $fee = 13000;
                // }

               
                $todaydate= date('Y-m-d');
                $totalamount='0';
          if ($entry >= '1' and $entry <= '4' ) {
                $entyFee = $entry * $fee;
                $totalamount =  $totalamount +$entyFee;
                }
                if ($entry >= '5' and $entry <= '10') {
                $a = $entry * $fee;
                $b = $a*5/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
                if ($entry >= '11' and $entry <= '20') {
                $a = $entry * $fee;
                $b = $a*10/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
                if ($entry >= '21' and $entry <= '50') {
                $a = $sumhindieng * $fee;
                $b = $a*15/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
                if ($entry > '50' ) {

                $a = $sumhindieng * $fee;
                $b = $a*20/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
         $gstamount = $totalamount * 18 / 100;
         $randno = time();
         $uid = $user->id;
         $gst = $user->gst;
         $orderid = $uid.'_idma2018_'.$randno;
         $clientip= $_SERVER['REMOTE_ADDR'];
          $chargetotal =$totalamount + $gstamount ;
         //$chargetotal =1 ;
     date_default_timezone_set('Asia/Kolkata');
     $dateTime= date('Y:m:d-H:i:s');

           $data = array(
         'userid'=>$user->id,'entry'=>$entry,'amount'=>$totalamount,'gst'=>$gst,'gstamount'=>$gstamount,'txndatetime'=> $dateTime,'orderid'=> $orderid,'clientip'=> $clientip, 'chargetotal'=>$chargetotal
         );
        return view('makeonelinepayment',['data'=>$data]);
    }

     /*online payment  page*/
    
    protected function validator(array $data)
    {  
          $messages = [
            'name.required' => 'Please enter your Name!',
            'email.required' => 'Please enter your email',
            'company.required' => 'Please enter your company',
            'designation.required' => 'Please enter your designation',
            'city.required' => 'Please enter your city',
            'state.required' => 'Please enter your city',
            'country.required' => 'Please enter your country',
            'zipcode.required' => 'Please enter 6 digit zip/pin code',
            'mobile.required' => 'Please enter your mobile',            
            //'mobile.size' => 'Enter 10 Digit Mobile no'
            ];  
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'designation' => 'required|max:255',
            'company' => 'required|max:255',
            'city' => 'required|max:255',
            'state' => 'required|max:255',
            'country' => 'required|max:255',
            'mobile' => 'required|numeric',            
            'zipcode' => 'required|numeric'            
            ],$messages );
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
 


public function paymentoption(Request $request)
    {  
         return view('paymentoption');
    }
/*check payment*/
public function makecheckpayment()
    {
$user = Auth::user();  
$entry = DB::table('tbl_idma_2018_entry')->join('tbl_idma_2018_category_entry', 'tbl_idma_2018_entry.id', '=', 'tbl_idma_2018_category_entry.eid')->where('tbl_idma_2018_entry.userid', $user->id)
->where('tbl_idma_2018_entry.status', 'active')->count('tbl_idma_2018_category_entry.eid');  
  $entrydata = Entry::join('tbl_idma_2018_category_entry', 'tbl_idma_2018_entry.id', '=', 'tbl_idma_2018_category_entry.eid')->join('tbl_idma_2018_subcategory', 'tbl_idma_2018_category_entry.SubCatId', '=', 'tbl_idma_2018_subcategory.subcategoryid')->select('region')->where('tbl_idma_2018_entry.userid', $user->id)
         ->where('tbl_idma_2018_entry.status', 'active')->get();

            $totalamount='0';
                $today = date('y-m-d');
                $erly= date('18-03-23');
                $deadline= date('18-06-09');
                $edeadline= date('18-06-10');
                // if ($today <  $erly) {
                //      $fee = 10000;
                // }
                //  if ($today > $erly and  $today <  $deadline) {
                //      $fee = 12000;
                // }
                //  if ($today > $deadline and $today < $edeadline) {
                //      $fee = 13000;
                // }

               $fee = 13000;
                $todaydate= date('Y-m-d');
                $totalamount='0';
          if ($entry >= '1' and $entry <= '4' ) {
                $entyFee = $entry * $fee;
                $totalamount =  $totalamount +$entyFee;
                }
                if ($entry >= '5' and $entry <= '10') {
                $a = $entry * $fee;
                $b = $a*5/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
                if ($entry >= '11' and $entry <= '20') {
                $a = $entry * $fee;
                $b = $a*10/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
                if ($entry >= '21' and $entry <= '50') {
                $a = $sumhindieng * $fee;
                $b = $a*15/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
                if ($entry > '50' ) {

                $a = $sumhindieng * $fee;
                $b = $a*20/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
         $gstamount = $totalamount * 18 / 100;
         $randno = time();
         $uid = $user->id;
         $gst = $user->gst;
         $orderid = $uid.'_idma2018_'.$randno;
         $clientip= $_SERVER['REMOTE_ADDR'];
          $chargetotal =$totalamount + $gstamount ;
         $gstamount = $totalamount * 18 / 100;
         $randno = time();
         $uid = $user->id;
         $gst = $user->gst;
         $orderid = $uid.'_idma2018_'.$randno;
         $clientip= $_SERVER['REMOTE_ADDR'];
          $chargetotal =$totalamount + $gstamount ;
         //dd($gstamount);
$randno = time();
$uid = $user->id;
$gst = $user->gst;
$orderid = $uid.'_idma_2018_'.$randno;
$data = array(
'userid'=>$user->id,'entry'=>$entry,'amount'=>$totalamount,'orderid'=> $orderid,'gst'=>$gst,'gstamount'=>$gstamount
);
        return view('paymentcheque',['data'=>$data]);
}
/*check payment*/
/*neft*/
 public function makeneftpayment()
    {
$user = Auth::user();  
$entry = DB::table('tbl_idma_2018_entry')->join('tbl_idma_2018_category_entry', 'tbl_idma_2018_entry.id', '=', 'tbl_idma_2018_category_entry.eid')->where('tbl_idma_2018_entry.userid', $user->id)
->where('tbl_idma_2018_entry.status', 'active')->count('tbl_idma_2018_category_entry.eid');
 $entrydata = Entry::join('tbl_idma_2018_category_entry', 'tbl_idma_2018_entry.id', '=', 'tbl_idma_2018_category_entry.eid')->join('tbl_idma_2018_subcategory', 'tbl_idma_2018_category_entry.SubCatId', '=', 'tbl_idma_2018_subcategory.subcategoryid')->select('region')->where('tbl_idma_2018_entry.userid', $user->id)
         ->where('tbl_idma_2018_entry.status', 'active')->get();
        
//dd(DB::getQueryLog());
//echo '<pre>';print_r($entrydata);echo '</pre>'; exit;
                $totalamount='0';
                $today = date('y-m-d');
                
                $erly= date('18-03-23');
                $deadline= date('18-06-09');
                $edeadline= date('18-06-10');
                // if ($today <  $erly) {
                //      $fee = 10000;
                // }
                //  if ($today > $erly and  $today <  $deadline) {
                //      $fee = 12000;
                // }
                //  if ($today > $deadline and $today < $edeadline) {
                //      $fee = 13000;
                // }

               $fee = 13000;
                $todaydate= date('Y-m-d');
                $totalamount='0';
          if ($entry >= '1' and $entry <= '4' ) {
                $entyFee = $entry * $fee;
                $totalamount =  $totalamount +$entyFee;
                }
                if ($entry >= '5' and $entry <= '10') {
                $a = $entry * $fee;
                $b = $a*5/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
                if ($entry >= '11' and $entry <= '20') {
                $a = $entry * $fee;
                $b = $a*10/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
                if ($entry >= '21' and $entry <= '50') {
                $a = $sumhindieng * $fee;
                $b = $a*15/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
                if ($entry > '50' ) {

                $a = $sumhindieng * $fee;
                $b = $a*20/100;
                $entyFee = $a-$b;
                 $totalamount =  $totalamount +$entyFee;
                }
        
         $totalamount = $totalamount;
         $gstamount = $totalamount * 18 / 100;
         $randno = time();
         $uid = $user->id;
         $gst = $user->gst;
         $orderid = $uid.'_idma2018_'.$randno;
         $clientip= $_SERVER['REMOTE_ADDR'];
          $chargetotal =$totalamount + $gstamount ;
$data = array(
'userid'=>$user->id,'entry'=>$entry,'amount'=>$totalamount,'orderid'=> $orderid,'gst'=>$gst,'gstamount'=>$gstamount
);
         
        return view('paymentneft',['data'=>$data]);
}
/*neft*/

public function chequedatainsert(Request $request)
{
    $user = Auth::user();  
    if($request->all()){
    $pdata = $request->all();
    session_start();
    $username= $user->name;
    $randno = time();
    $orderid = $user->id.'_idma_2018_'.$randno;
    $clientip = $_SERVER['REMOTE_ADDR'];
    $payment = PaymentCheque::create([
    'uid' => $user->id,
    'OrderNo' => $orderid,
    'Name' => $pdata['txtName'],
    'Email' => $pdata['txtEmail'],
    'Organisation' => $pdata['txtCompanyName'],
    'MobileNo' => $pdata['txtmobile'],
    'Address' => $pdata['txtaddress'],
    'ChequeNo' => $pdata['txtChqNo'],
    'BankName' => $pdata['txtBankName'],
    'Remark' => $pdata['txtRemrks'],
    'Amount' => $pdata['txtTotalamount'], 
    'username' => $username, 
    'numberofentries' => $pdata['txtentry'],
    'clientip' => $clientip,
    'status' => '1',
    'gst' => $pdata['txtGSTNo'],  
    ]);
    if($payment){
    $subject = 'Payment details for IDMA-Awards-2018';
    Mail::to($pdata['txtEmail'])->cc(['aakash.e4mnew@gmail.com','ksbatra@exchange4media.com','priyanka.bhadouria@exchange4media.com','sabita.verma@exchange4media.com','gluthra@exchange4media.com','nikita.vig@exchange4media.com','aditya.muvvala@exchange4media.com'])->send(new UserPaymentchequeMail( $pdata ) );
    }
    //dd($payment);
    $message= 'Payment has been done and your payment id is : '.$payment->id;
    return redirect('/dashboard')->with('message',$message);
    }
    else{
    $message = 'Payment has been failed';    
    return redirect('/dashboard')->with('message',$message);
    }
}
public function neftdatainsert(Request $request)
{
    $user = Auth::user();  
    if($request->all()){
    $pdata = $request->all();
    session_start();
    $username= $user->name;
    $randno = time();
    $orderid = $user->id.'_idma_2018_'.$randno;
    $clientip = $_SERVER['REMOTE_ADDR'];
    $payment = PaymentNEFT::create([
    'uid' => $user->id,
    'OrderNo' => $orderid,
    'Name' => $pdata['txtName'],
    'Email' => $pdata['txtEmail'],
    'Organisation' => $pdata['txtCompanyName'],
    'MobileNo' => $pdata['txtmobile'],
    'Address' => $pdata['txtaddress'],
    'Amount' => $pdata['txtTotalamount'], 
    'username' => $username, 
    'numberofentries' => $pdata['txtentry'],
    'clientip' => $clientip,
    'status' => '1',
    'gst' => $pdata['txtGSTNo'],  
    ]);
    if($payment){
    $subject = 'Payment details for IDMA-Awards-2018';
   Mail::to($pdata['txtEmail'])->cc(['aakash.e4mnew@gmail.com','ksbatra@exchange4media.com','priyanka.bhadouria@exchange4media.com','sabita.verma@exchange4media.com','gluthra@exchange4media.com','nikita.vig@exchange4media.com','aditya.muvvala@exchange4media.com'])->send(new  UserPaymentneftMail( $pdata ) );
    }
    $message= 'Payment has been done and your payment id is : '.$payment->id;
    return redirect('/dashboard')->with('message',$message);
    }
    else{
    $message = 'Payment has been failed';    
    return redirect('/dashboard')->with('message',$message);
    }
}
}
