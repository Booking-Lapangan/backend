<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'lapangan_id',
        'date',
        'hour',
        'status'
    ];

    public function lapangan()
    {
        return $this->belongsTo(Lapangan::class);
    }
}
