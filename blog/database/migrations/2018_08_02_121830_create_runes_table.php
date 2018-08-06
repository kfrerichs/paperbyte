<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('runes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('img_name');
            $table->string('novice_name');
            $table->string('novice_descr');
            $table->integer('novice_price');
            $table->string('adept_name');
            $table->string('adept_descr');
            $table->integer('adept_price');
            $table->string('expert_name');
            $table->string('expert_descr');
            $table->integer('expert_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('runes');
    }
}
