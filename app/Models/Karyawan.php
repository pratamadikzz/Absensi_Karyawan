<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Karyawan extends Model
{
    //
    protected $guarded = [];

   public function shift()
{
    return $this->belongsTo(Shift::class);
}

public function jabatan()
{
    return $this->belongsTo(Jabatan::class);
}

}
