<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DelPaymentneftMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $pdata;

    public function __construct($pdata)
    {
        $this->userdata = $pdata;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        //$address = 'neetesh.bhardwaj@exchange4media.com';
        $name = 'Adsert';
        $subject = 'Payment details via NEFT IDMA-Awards-2018 Delegate Registraion';
       //print_r($this->userdata);die;
        return $this->view('emails.delneftpay')->subject($subject)->with(['txtName' => $this->userdata['name'],'txtEmail' => $this->userdata['email'],'txtCompanyName' => $this->userdata['companylegname'],'txtmobile' => $this->userdata['mobile'],'txtaddress' => $this->userdata['address'],'txtTotalamount' => $this->userdata['chargetotal'],'num_del' => $this->userdata['num_del'],'txtGSTNo' => $this->userdata['gst_no'],'del_fees' => $this->userdata['del_fees'],'del_type' => $this->userdata['del_type']]);  
    }
}
