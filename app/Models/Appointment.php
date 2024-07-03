<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function applications()
    {
        return $this->belongsToMany(Application::class, 'appointment_application');
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
