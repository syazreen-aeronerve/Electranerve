<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class newRefund extends Mailable
{
    use Queueable, SerializesModels;
    public $order,$url,$refund;

    /**
     * Create a new message instance.
     */
    public function __construct($order,$url,$refund)
    {
        $this->order = $order;
        $this->url = $url;
        $this->refund = $refund;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject("New Refund Request")
        ->view('emails.newrefund');
    }
}
