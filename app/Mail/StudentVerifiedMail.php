<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;


class StudentVerifiedMail extends Mailable
{
    public $student;

    public function __construct($student)
    {
        $this->student = $student;
    }

    public function build()
    {
        return $this->subject('Pendaftaran Anda Telah Diverifikasi')
            ->view('emails.verified-student');
    }
}
