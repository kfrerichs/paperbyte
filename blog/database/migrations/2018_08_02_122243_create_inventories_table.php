<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('character_id')->unsigned();
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('cascade');
            $table->string('item_name');
            $table->string('description');
            $table->integer('modulo');
            $table->integer('ability_id')->unsigned();
            $table->foreign('ability_id')->references('id')->on('abilities')->onDelete('cascade');
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
        Schema::table('inventories',function(Blueprint $table){
            $table->dropForeign(['character_id']);
            $table->dropForeign(['ability_id']);
        });
        Schema::dropIfExists('inventories');
    }
}
