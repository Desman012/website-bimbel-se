<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class StudentRejectedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reason;
    public $registration;

    public function __construct($reason, $registration)
    {
        $this->reason = $reason;
        $this->registration = $registration;
    }

    public function build()
    {
        return $this->subject('Pendaftaran Anda Ditolak')
                    ->view('emails.student_rejected')
                    ->with([
                        'reason' => $this->reason,
                        'registration' => $this->registration,
                    ]);
    }
}
