<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'notes',
    ];

    /**
     * The appointments that belong to the client.
     */
    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * The payments that belong to the client.
     */
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
