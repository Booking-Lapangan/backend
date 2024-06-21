<?php

namespace Database\Seeders;

use App\Models\RulesCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RulesCategorySeeder extends Seeder
{
<<<<<<< HEAD
=======
    /**
     * Run the database seeds.
     */
>>>>>>> master
    public function run(): void
    {
        RulesCategory::insert([
            'category' => 'Rules In Field',
        ]);
        RulesCategory::insert([
            'category' => 'Rules Out Field',
        ]);
        RulesCategory::insert([
            'category' => 'Rules Rent',
        ]);
    }
}
