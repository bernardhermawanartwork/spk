<?php

namespace App\Models;

use App\Models\Kehadiran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jemaat extends Model
{
    use HasFactory;

 
    protected $guarded = [];

    public function kehadiran()
    {
       //return $this->hasOne(Kehadiran::class);
    }
}
