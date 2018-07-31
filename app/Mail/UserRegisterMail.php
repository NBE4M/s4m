<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegisterMail extends Mailable
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
		$subject = 'Registration details for IDMA AWARDS 2018';
	//	echo '<pre>';print_r($this->userdata);echo '</pre>';exit;
		 /*  return $this->view('emails.UserRegisterMail')->from($address, $name)->cc($address, $name)->bcc($address, $name)->subject($subject)
		->with([ 
		'email' => $this->userdata['email'],
		'user_pass' => $this->userdata['user_pass']
		]); */ 
		return $this->view('emails.UserRegisterMail')->subject($subject)->with([ 'email' => $this->userdata['email'],
		'user_pass' => $this->userdata['user_pass']]);		
    }
}
