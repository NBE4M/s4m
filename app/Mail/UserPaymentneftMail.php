<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserPaymentneftMail extends Mailable
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
       $subject = 'Payment details via NEFT for IDMA-2018';
       //print_r($this->userdata);die;
       return $this->view('emails.neftpay')->subject($subject)->with(['txtName' => $this->userdata['txtName'],'txtEmail' => $this->userdata['txtEmail'],'txtCompanyName' => $this->userdata['txtCompanyName'],'txtmobile' => $this->userdata['txtmobile'],'txtaddress' => $this->userdata['txtaddress'],'txtTotalamount' => $this->userdata['txtTotalamount'],'txtentry' => $this->userdata['txtentry'],'txtGSTNo' => $this->userdata['txtGSTNo']]);      
   }
}
