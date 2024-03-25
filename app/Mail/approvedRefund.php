<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class approvedRefund extends Mailable
{
    public $order,$url,$refund;

    public function __construct($order,$url,$refund)
    {
        $this->order = $order;
        $this->url = $url;
        $this->refund = $refund;
    }

    public function build()
    {
        return $this->subject("Refund Approved")
        ->view('emails.apprefund');
    }
}
