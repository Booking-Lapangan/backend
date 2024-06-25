<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'lapangan_id',
        'schedule_id',
        'date',
        'status'
    ];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function detailBooking()
    {
        return $this->hasOne(DetailBooking::class);
    }
}
