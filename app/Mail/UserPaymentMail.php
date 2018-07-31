<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserPaymentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
	public  $pdata ;
    public function __construct($pdata )
    {
        $this->userdata = $pdata ;
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
       $subject = 'Order No-' .$this->userdata['oid']. ' '.'('.($this->userdata['ipgTransactionId']).')';
       return $this->view('emails.pay')->subject($subject)->with([ 'response_hash' => $this->userdata['response_hash'],'address' => $this->userdata['baddress1'],'entry' => $this->userdata['entry'],'txndatetime' => $this->userdata['txndatetime'],'country' => $this->userdata['bcountry'],'oid' => $this->userdata['oid'],'approval_code' => $this->userdata['approval_code'],'mobile' => $this->userdata['mobile'],'bcompany' => $this->userdata['bcompany'],'bname' => $this->userdata['bname'],'email' => $this->userdata['bemail'],'ccbrand' => $this->userdata['ccbrand'],'amount' => $this->userdata['chargetotal'],'endpointTransactionId' => $this->userdata['endpointTransactionId'],'ipgTransactionId' => $this->userdata['ipgTransactionId'],'cip' => $this->userdata['cip'],'gstdata' => $this->userdata['gstdata']]);      
   }
}
