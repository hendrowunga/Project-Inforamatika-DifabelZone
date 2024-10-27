<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;
    public $token;
    public $email;

    /**
     * Create a new message instance.
     */
    public function __construct($token, $email)
    {
        $this->token = $token;
        $this->email = $email;
    }

    // Inside the ResetPasswordMail class
    public function build()
    {
        $url = url('/password/reset-form?email=' . urlencode($this->email) . '&token=' . urlencode($this->token));
        return $this->view('emails.reset-password')
            ->subject('Reset Password Notification')
            ->with(['url' => $url]);
    }
}


/**
 * Get the message envelope.
 */
// public function envelope(): Envelope
// {
//     return new Envelope(
//         subject: 'Reset Password Mail',
//     );
// }

/**
 * Get the message content definition.
 */
// public function content(): Content
// {
//     return new Content(
//         view: 'view.name',
//     );
// }

/**
 * Get the attachments for the message.
 *
 * @return array<int, \Illuminate\Mail\Mailables\Attachment>
 */
    // public function attachments(): array
    // {
    //     return [];
    // }