<?php

namespace App\Models;

use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RulesCategory extends Model
{
    use HasFactory;

    protected $table = 'rules_category';
    protected $primaryKey = 'id_category';

    protected $fillable = ['category'];

    public function rules()
    {
        return $this->hasMany(Rules::class, 'id_category');
    }
}
