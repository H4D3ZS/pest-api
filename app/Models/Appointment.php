<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'service_id',
        'appointment_date',
        'status',
        'notes',
    ];

    /**
     * The user that owns the appointment.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The service associated with the appointment.
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }



    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
