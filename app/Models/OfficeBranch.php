<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfficeBranch extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function psychologists()
    {
        return $this->belongsToMany(User::class, 'office_branch_psychologist');
    }
}
