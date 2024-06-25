<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'nama_tim',
        'email',
        'no_hp',
        'note',
    ];

    // Relasi ke model Booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
