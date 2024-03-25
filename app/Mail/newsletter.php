<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class newsletter extends Mailable
{
    use Queueable, SerializesModels;
    public $eventz,$url;

    public function __construct($eventz,$url)
    {
        $this->eventz = $eventz;
        $this->url = $url;
    }

    public function build()
    {
        return $this->subject("Newsletter")->view('emails.newsletter');
    }
    
}
