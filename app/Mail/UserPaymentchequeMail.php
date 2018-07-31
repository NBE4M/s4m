<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserPaymentchequeMail extends Mailable
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
       $subject = 'Cheque Payment details for IDMA-2018';
       //print_r($subject);die;
      return $this->view('emails.chequepay')->subject($subject)->with(['txtName' => $this->userdata['txtName'],'txtRemrks' => $this->userdata['txtRemrks'],'txtCompanyName' => $this->userdata['txtCompanyName'],'txtChqNo' => $this->userdata['txtChqNo'],'txtBankName' => $this->userdata['txtBankName'],'txtTotalamount' => $this->userdata['txtTotalamount'],'txtentry' => $this->userdata['txtentry'],'txtGSTNo' => $this->userdata['txtGSTNo']]);   
   }
}
