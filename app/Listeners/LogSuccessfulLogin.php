<?php
// app/Listeners/LogSuccessfulLogin.php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\ActivityLog;

class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        // Mencatat aktivitas login ke dalam tabel activity_logs
        ActivityLog::create([
            'user_id' => $event->user->id,
            'action' => 'Logged in',
        ]);
    }
}
