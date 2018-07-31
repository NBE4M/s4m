<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DelPaymentCheque;
use App\DelPaymentNEFT;
use App\Delegate;
use App\PaymentDel;
use Validator;
use Mail;
use App\Mail\DelegatePaymentregister;
use DB;
use App\Mail\DelPaymentChequeMail;
use App\Mail\DelPaymentneftMail;
use App\Mail\DelPaymentnoMail;

class DelegateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('delegate');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->pay_mode == 'CC'){ 
            DB::enableQueryLog();
         //$user = Auth::user();
         //$gstamount = $totalamount * 18 / 100;
         $randno = time();
         //$uid = $user->id;
         //$gst = $user->gst;
         $orderid = $randno.'_idma_2018_'.$randno;
         $clientip= $_SERVER['REMOTE_ADDR'];
     //$chargetotal =$totalamount + $gstamount ;
         $chargetotal =$request->totalamount;
            //$chargetotal= '1';
     //print_r($gst);die;
           $data = array(
            'amount'=>$request->amount,'fees'=>$request->fees,'del_fees'=>$request->del_fees,'summary'=>$request->summary,'totalamount'=>$request->totalamount,'gst'=>$request->gstamount,'orderid'=> $orderid,'clientip'=> $clientip,'name'=>$request->name,'email'=>$request->email,'info'=>$request->info,'companylegalname'=>$request->companylegalname,'gst_no'=>$request->txtGSTNo,'address'=>$request->address,'city'=>$request->city,'state'=>$request->state,'ctry'=>$request->country,'pin_code'=>$request->pincode,'del_name_compy'=>$request->del_name_compy,'fee_option'=>$request->fee_option,'num_del'=>$request->num_del,'amount'=>$request->amount,'pay_mode'=>$request->pay_mode,'mobile'=>$request->mobile,'office_num'=>$request->office_num
         );
        return view('delegate/delonlinepayment',['data'=>$data]);

        }elseif($request->pay_mode == 'Cheque/Demand Draft'){
            $data = array('amount'=>$request->amount,'fees'=>$request->fees,'del_fees'=>$request->del_fees,'summary'=>$request->summary,'totalamount'=>$request->totalamount,'gst'=>$request->gstamount,'name'=>$request->name,'email'=>$request->email,'info'=>$request->info,'companylegalname'=>$request->companylegalname,'gst_no'=>$request->txtGSTNo,'address'=>$request->address,'city'=>$request->city,'state'=>$request->state,'ctry'=>$request->country,'pin_code'=>$request->pincode,'del_name_compy'=>$request->del_name_compy,'fee_option'=>$request->fee_option,'num_del'=>$request->num_del,'amount'=>$request->amount,'pay_mode'=>$request->pay_mode,'mobile'=>$request->mobile,'office_num'=>$request->office_num);
            return view('delegate/delchequepayment')->with(['data' => $data]);
        }
        elseif($request->pay_mode == 'NA'){
                    if($request->all()){
                    $pdata = $request->all();
                    if ($pdata['fees']=='rddele') {
                        $delegate_Pass_category='Delegate Pass Booking';
                    }else{
                        $delegate_Pass_category='Table Booking';
                    }
                    if($pdata['del_fees']=='awcfe') {
                       $Delegate_Type = 'Awards + Conference';
                    }
                     elseif($pdata['del_fees']=='cpb') {
                        $Delegate_Type = 'Conference Pass Booking';
                    }
                     elseif($pdata['del_fees']=='ap') {
                        $Delegate_Type = 'Awards Pass';
                    }
                     elseif($pdata['del_fees']=='acp') {
                        $Delegate_Type = 'All Access Pass';
                    }
                     elseif($pdata['del_fees']=='st') {
                        $Delegate_Type = 'Students';
                    }
                    elseif($pdata['del_fees']=='cfe') {
                         $Delegate_Type = 'Conference';
                    }
                    elseif($pdata['del_fees']=='aw') {
                        $Delegate_Type = 'Awards';
                    }
                   else{
                    $Delegate_Type = 'Exhibition/Visitor Pass';
                   }
                    session_start();
                    $randno = time();
                    $orderid = 'del_IDMA_2018_'.$randno;
                    $clientip = $_SERVER['REMOTE_ADDR'];
                    $payment = DelPaymentNEFT::create([
                    'OrderNo' => $orderid,
                    'Name' => $pdata['name'],
                    'Email' => $pdata['email'],
                    'Organisation' => $pdata['companylegalname'],
                    'MobileNo' => $pdata['mobile'],
                    'Address' => $pdata['address'],
                    'Amount' => $pdata['amount'], 
                    'numberofentries' => $pdata['num_del'],
                    'clientip' => $clientip,
                    'status' => '1',
                    'gst' => $pdata['txtGSTNo'],  
                    'delegate_Pass_category' => $delegate_Pass_category,  
                    'Delegate_Type' => $Delegate_Type, 
                    ]);
                    if($payment){
                    //$subject = 'Payment details for OOH-Awards-2018';
                    Mail::to($pdata['email'])->cc(['aakash.e4mnew@gmail.com','amisha.shah@exchange4media.com','nikita.vig@exchange4media.com','anand.thakrar@exchange4media.com','gluthra@exchange4media.com','aditya.muvvala@exchange4media.com'])->send(new DelPaymentnoMail( $pdata ) );
                    }
                    $message= 'You Have Registered Successfully';
                    return redirect('/delegate')->with('message',$message);
                    }
                    else{
                    $message = 'failed';    
                    return redirect('/delegate')->with('message',$message);
                    }
        }else{
           $data = array('amount'=>$request->amount,'fees'=>$request->fees,'del_fees'=>$request->del_fees,'summary'=>$request->summary,'totalamount'=>$request->totalamount,'gst'=>$request->gstamount,'name'=>$request->name,'email'=>$request->email,'info'=>$request->info,'companylegalname'=>$request->companylegalname,'gst_no'=>$request->txtGSTNo,'address'=>$request->address,'city'=>$request->city,'state'=>$request->state,'ctry'=>$request->country,'pin_code'=>$request->pincode,'del_name_compy'=>$request->del_name_compy,'fee_option'=>$request->fee_option,'num_del'=>$request->num_del,'pay_mode'=>$request->pay_mode,'mobile'=>$request->mobile,'office_num'=>$request->office_num);
            return view('delegate/delpaymentneft')->with(['data' => $data]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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

    
    public function delcheckpayment(Request $request)
{
   //dd($request);
    if($request->all()){
    $pdata = $request->all();
    session_start();
    $randno = time();
    $orderid = 'del_IDMA-Awards_'.$randno;
    $clientip = $_SERVER['REMOTE_ADDR'];
    $payment = DelPaymentCheque::create([
    'OrderNo' => $orderid,
    'Name' => $pdata['txtName'],
    'Email' => $pdata['email'],
    'Organisation' => $pdata['companylegname'],
    'MobileNo' => $pdata['mobile'],
    'Address' => $pdata['address'],
    'ChequeNo' => $pdata['txtChqNo'],
    'BankName' => $pdata['txtBankName'],
    'Remark' => $pdata['txtRemrks'],
    'Amount' => $pdata['chargetotal'], 
    //'username' => $username, 
    'numberofentries' => $pdata['num_del'],
    'clientip' => $clientip,
    'status' => '1',
    'gst' => $pdata['gst_no'], 
    'delegate_Pass_category' => $pdata['del_fees'],  
    'Delegate_Type' => $pdata['del_type'], 
    ]);
    //dd($pdata);
    if($payment){
    //$subject = 'Payment details for OOH-Awards-2018';
    Mail::to($pdata['email'])->cc(['aakash.e4mnew@gmail.com','amisha.shah@exchange4media.com','nikita.vig@exchange4media.com','anand.thakrar@exchange4media.com','gluthra@exchange4media.com','priyanka.bhadouria@exchange4media.com','aditya.muvvala@exchange4media.com'])->send(new DelPaymentChequeMail($pdata));
    }
    $message= 'Payment has been done and your payment id is : '.$payment->id;
    return redirect('/delegate')->with('message',$message);
    }
    else{
    $message = 'Payment has been failed';    
    return redirect('/delegate')->with('message',$message);
    }
}

public function delneftdatainsert(Request $request)
{
    //dd($request);
    
    if($request->all()){
    $pdata = $request->all();
    session_start();
    $randno = time();
    $orderid = 'del_IDMA_2018_'.$randno;
    $clientip = $_SERVER['REMOTE_ADDR'];
    $payment = DelPaymentNEFT::create([
    'OrderNo' => $orderid,
    'Name' => $pdata['name'],
    'Email' => $pdata['email'],
    'Organisation' => $pdata['companylegname'],
    'MobileNo' => $pdata['mobile'],
    'Address' => $pdata['address'],
    'Amount' => $pdata['chargetotal'], 
    'numberofentries' => $pdata['num_del'],
    'clientip' => $clientip,
    'status' => '1',
    'gst' => $pdata['gst_no'],  
    'delegate_Pass_category' => $pdata['del_fees'],  
    'Delegate_Type' => $pdata['del_type'], 
    ]);
    if($payment){
    //$subject = 'Payment details for OOH-Awards-2018';
    Mail::to($pdata['email'])->cc(['aakash.e4mnew@gmail.com','amisha.shah@exchange4media.com','nikita.vig@exchange4media.com','anand.thakrar@exchange4media.com','gluthra@exchange4media.com','priyanka.bhadouria@exchange4media.com','aditya.muvvala@exchange4media.com'])->send(new DelPaymentneftMail( $pdata ) );
    }
    $message= 'Payment has been done and your payment id is : '.$payment->id;
    return redirect('/delegate')->with('message',$message);
    }
    else{
    $message = 'Payment has been failed';    
    return redirect('/delegate')->with('message',$message);
    }
}




}
