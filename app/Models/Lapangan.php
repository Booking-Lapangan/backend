<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'title',
        'price',
        'fasilitas',
        'rules'
    ];

    protected $casts = [
        'fasilitas' => 'array',
        'rules' => 'array',
    ];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function gallerys()
    {
        return $this->hasMany(Gallery::class);
    }
}
