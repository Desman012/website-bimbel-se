<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AccountPending extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['mail']; // pastikan ada 'mail' di sini
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Pendaftaran Akun Anda Sedang Diproses')
                    ->greeting("Halo {$notifiable->full_name},")
                    ->line('Proses pendaftaran akun Anda sedang diproses oleh Admin.')
                    ->line('Silakan cek email Anda secara berkala untuk update status.')
                    ->action('Kembali ke Home', url('/'))
                    ->line('Terima kasih telah mendaftar!');
    }
}
