<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user_name;
    public $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user_name, $token)
    {    //dd($user_name, $token);
        $this->user_name = $user_name;
        $this->token = $token;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    // public function envelope()
    // {
    //     return new Envelope(
    //         subject: 'Send Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    //
    public function build()
    {
        // return $this->markdown('mail.opt_send')->with([
        //     'user_name' => $this->user_name,
        //     'code' => $this->token
        // ]);

        return $this->from('addy02marketing02@gmail.com', 'Me')
            ->to($this->user_name, $this->user_name)
            ->view('mail.opt_send')
            ->with([
            'user_name' => $this->user_name,
            'code' => $this->token
            ]);
    }

}