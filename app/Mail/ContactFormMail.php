<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $array;

    /**
     * Create a new message instance.
     */
    public function __construct($array)
     {
         $this->array = $array;
     }
    /**
     * Get the message envelope.
     */


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Form Mail',
        );
    }

    public function build()
    {
        return $this->from('no-reply@job.edgeemg.co.uk', 'Aashish Kiphayet')
                    ->subject($this->array['subject'])
                    ->markdown('emails.contactmail');
    }
}
