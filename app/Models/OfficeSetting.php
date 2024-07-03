<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeSetting extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}
