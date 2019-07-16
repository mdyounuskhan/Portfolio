<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contactMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $send_to_first_name = "";
    public $send_to_last_name = "";
    public $send_to_subject = "";
    public $send_to_message = "";
    public function __construct($first_name, $last_name, $subject, $message)
    {
        $this->send_to_first_name = $first_name;
        $this->send_to_last_name = $last_name;
        $this->send_to_subject = $subject;
        $this->send_to_message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.contactsendcompany');
    }
}
