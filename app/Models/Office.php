<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function officeBranches()
    {
        return $this->hasMany(OfficeBranch::class);
    }

    public function psychologists()
    {
        return $this->hasMany(User::class);
    }

}
