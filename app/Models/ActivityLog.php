<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    // Relasi dengan User (ActivityLog milik satu User)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Menentukan kolom yang bisa diisi
    protected $fillable = ['action', 'description', 'user_id'];

    // Pastikan kita menambahkan timestamp untuk kolom created_at dan updated_at
    public $timestamps = true;
}
