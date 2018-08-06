<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNpcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('npcs', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('hidden');
            $table->string('name')->unique();
            $table->string('gender');
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->string('background');
            $table->integer('meetingpoint_id')->unsigned();
            $table->foreign('meetingpoint_id')->references('id')->on('places')->onDelete('cascade');
            $table->string('item_1');
            $table->string('item_2');
            $table->string('item_3');
            $table->string('item_4');
            $table->string('item_5');
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
        Schema::table('npcs',function(Blueprint $table){
            $table->dropForeign(['job_id']);
            $table->dropForeign(['meetingpoint_id']);
        });
        Schema::dropIfExists('npcs');
    }
}
