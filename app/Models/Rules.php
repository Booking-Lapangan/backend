<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rules extends Model
{
    use HasFactory;

    protected $table = 'rules';
    protected $primaryKey = 'id_rules';

    protected $fillable = ['rules', 'id_category'];

    public function category()
    {
        return $this->belongsTo(RulesCategory::class, 'id_category');
    }
}
