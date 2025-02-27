<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Shift extends Model
{
    //
    protected $guarded = [];

    public function karyawan(): HasMany
    {
        return $this->hasMany(Karyawan::class);
    }
}
