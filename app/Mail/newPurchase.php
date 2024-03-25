<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class newPurchase extends Mailable
{
    use Queueable, SerializesModels;
    public $order,$url;

    /**
     * Create a new message instance.
     */
    public function __construct($order,$url)
    {
        $this->order = $order;
        $this->url = $url;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        $eventname = $this->order->events->event_name;
        return $this->subject("New Purchase Confirmed")
        ->view('emails.newpurchase');
    }
}
