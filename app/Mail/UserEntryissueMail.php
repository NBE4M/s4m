<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserEntryissueMail extends Mailable
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
		$name = 'Adsert';
		$subject = 'Entry details for idma-awards-2018';
		return $this->view('emails.UserEnrtyidssueMail')->subject($subject)->with(['catentryid' => $this->userdata['catentryid'], 'Entryid' => $this->userdata['entryid'],'Juryyid' => $this->userdata['juryid'],'Comment' => $this->userdata['comment']]);		
    }
}
