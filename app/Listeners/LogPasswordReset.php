<?php

namespace App\Listeners;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Log;

class LogPasswordReset
{
    /**
     * Handle the event.
     */
    public function handle(PasswordReset $event)
    {
        // Log user ID yang reset password
        Log::info("Password berhasil di-reset untuk user id: " . $event->user->id);
    }
}
