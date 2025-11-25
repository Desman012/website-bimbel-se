<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class StudentRejectedNotification extends Notification
{
    use Queueable;

    protected $reason;

    public function __construct($reason)
    {
        $this->reason = $reason;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $name = $notifiable->full_name ?? $notifiable->student_email ?? 'Calon Siswa';
        return (new MailMessage)
            ->subject('Pendaftaran Anda Ditolak')
            ->greeting("Halo {$name},")
            ->line('Terima kasih telah mendaftar di Bimbel Sinar Education.')
            ->line('Mohon maaf pendaftaran Anda **ditolak** karena:')
            ->line($this->reason)
            ->line('Jika Anda ingin informasi lebih lanjut, silakan menghubungi admin.')
            ->salutation('Salam, Bimbel Sinar Education');
    }
}
