<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ThankYouMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Thank You for Registering')
                    ->view('templateMail')
                    ->with([
                        'firstName' => $this->user->first_name,
                        'lastName' => $this->user->last_name,
                        'companyName' => 'Manthan Mistry'
                    ]);
    }
}
