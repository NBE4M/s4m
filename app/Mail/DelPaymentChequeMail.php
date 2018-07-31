<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DelPaymentChequeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $pdata ;

    public function __construct($pdata)
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
        $name = 'Adsert';
        $subject = 'Cheque Payment details for IDMA-Awards-2018 Delegate Registraion';
        return $this->view('emails.delchequepay')->subject($subject)->with(['txtName' => $this->userdata['txtName'],'txtRemrks' => $this->userdata['txtRemrks'],'txtCompanyName' => $this->userdata['companylegname'],'txtChqNo' => $this->userdata['txtChqNo'],'txtBankName' => $this->userdata['txtBankName'],'txtTotalamount' => $this->userdata['chargetotal'],'txtGSTNo' => $this->userdata['gst_no'],'num_del' => $this->userdata['num_del'],'del_fees' => $this->userdata['del_fees'],'del_type' => $this->userdata['del_type']]);   
    }
}
