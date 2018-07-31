<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class DelPaymentnoMail extends Mailable
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
        $subject = 'Client details For IDMA-Awards-2018 Delegate Registraion';
                   if ($this->userdata['fees']=='rddele') {
                        $delegate_Pass_category='Delegate Pass Booking';
                    }else{
                        $delegate_Pass_category='Table Booking';
                    }
                    if($this->userdata['del_fees']=='awcfe') {
                       $Delegate_Type = 'Awards + Conference';
                    }
                     elseif($this->userdata['del_fees']=='cpb') {
                        $Delegate_Type = 'Conference Pass Booking';
                    }
                     elseif($this->userdata['del_fees']=='ap') {
                        $Delegate_Type = 'Awards Pass';
                    }
                     elseif($this->userdata['del_fees']=='acp') {
                        $Delegate_Type = 'All Access Pass';
                    }
                     elseif($this->userdata['del_fees']=='st') {
                        $Delegate_Type = 'Students';
                    }
                    elseif($this->userdata['del_fees']=='cfe') {
                         $Delegate_Type = 'Conference';
                    }
                    elseif($this->userdata['del_fees']=='aw') {
                        $Delegate_Type = 'Awards';
                    }
                   else{
                    $Delegate_Type = 'Exhibition/Visitor Pass';
                   }
        return $this->view('emails.delnopay')->subject($subject)->with(['txtName' => $this->userdata['name'],'txtEmail' => $this->userdata['email'],'txtCompanyName' => $this->userdata['companylegalname'],'txtmobile' => $this->userdata['mobile'],'txtaddress' => $this->userdata['address'],'txtTotalamount' => $this->userdata['amount'],'num_del' => $this->userdata['num_del'],'txtGSTNo' => $this->userdata['txtGSTNo'],'del_fees' => $delegate_Pass_category,'del_type' => $Delegate_Type]);  
    }
}
