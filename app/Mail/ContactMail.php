<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    private $name;
    private $email;
    private $content;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contact)
    {
        $this->name = $contact['name'];
        $this->email = $contact['email'];
        $this->content = $contact['content'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->markdown('contact.mail')
        ->from($this->email)
        ->subject('自動送信メール')
        ->with([
            'name' => $this->name,
            'email' => $this->email,
            'content' => $this->content,
        ]);
    }
}
