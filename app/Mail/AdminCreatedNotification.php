<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AdminCreatedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $adminName;
    public $password;
    
    /**
     * Create a new message instance.
     */
    public function __construct(string $adminName, string $password)
    {
        $this->adminName = $adminName;
        $this->password = $password;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Selamat Datang! Akun Admin Anda Telah Dibuat',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.admin-created', // Tunjuk ke view Blade Anda
        );
    }
}