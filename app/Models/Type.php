<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class, 'user_off_days');
    }
}
