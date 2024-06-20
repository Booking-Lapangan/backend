<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRulesCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('rules_category', function (Blueprint $table) {
            $table->id('id_category');
            $table->string('category');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rules_category');
    }
}
