<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DelegatePaymentregister extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	public  $userdata;
    public function __construct($userdata)
    {
        $this->userdata = $userdata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       /*  return $this->view('view.name'); */
		   $address = 'aakash.e4mnew@gmail.com';
		$name = 'Adsert';
		$subject = 'Registration details for Delegate idma Awards 2018';
         return $this->view('emails.DelegateUserRegisterMail')->subject($subject)->with([ 'response_hash' => $this->userdata['response_hash'],'address' => $this->userdata['address'],'txndatetime' => $this->userdata['txndatetime'],'country' => $this->userdata['cccountry'],'oid' => $this->userdata['oid'],'approval_code' => $this->userdata['approval_code'],'mobile' => $this->userdata['mobile'],'bcompany' => $this->userdata['companylegname'],'bname' => $this->userdata['bname'],'email' => $this->userdata['email'],'ccbrand' => $this->userdata['ccbrand'],'amount' => $this->userdata['chargetotal'],'endpointTransactionId' => $this->userdata['endpointTransactionId'],'ipgTransactionId' => $this->userdata['ipgTransactionId'],'cip' => $this->userdata['cip'],'gstdata' => $this->userdata['gst_no']]); 
    }
}
