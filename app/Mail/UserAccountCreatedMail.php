<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserAccountCreatedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role,
    ) {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Akun LD Indonesia Anda telah dibuat',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.user-account-created',
            with: [
                'name' => $this->name,
                'email' => $this->email,
                'password' => $this->password,
                'role' => $this->role,
            ],
        );
    }
}
