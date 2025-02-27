<?php

// app/Http/Controllers/ActivityLogController.php

namespace App\Http\Controllers;

use App\Models\ActivityLog; // Import model ActivityLog
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{


    public function showHistory()
    {
        $logs = ActivityLog::latest()->get(); // Ambil semua history aktivitas
        return view('history.day', compact('logs'));
    }
// Misalnya, jika kamu menyimpan data aktivitas


}
