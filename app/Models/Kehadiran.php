<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;
    public function jemaat()
    {
        //return $this->belongsTo(Jemaat::class);
    }
}
